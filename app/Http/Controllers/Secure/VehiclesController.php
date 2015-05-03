<?php namespace App\Http\Controllers\Secure;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\VehicleRequest;
use App\Repositories\BrandRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Maatwebsite\Excel\Collections\CellCollection;
use Maatwebsite\Excel\Facades\Excel;

class VehiclesController extends Controller {

    private $repository;
    private $brandRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(VehicleRepository $repository, BrandRepository $brandRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $delete_all_btn = $request->get('delete_all_btn');
        if(isset($delete_all_btn)) {
            $del_ids = $request->get('del_ids');
            if(isset($del_ids)) {
                $this->repository->destroy($del_ids);
            }
        }
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $vehicles = $this->repository->regexSearch($request->all(), $size);
        return view('secure.vehicles.index', compact('vehicles', 'size'))->with('request', $request->all());
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $brands = $this->brandRepository->lists('name', 'id');
		return view('secure.vehicles.create', compact('brands'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param VehicleRequest $request
     * @return Response
     */
	public function store(VehicleRequest $request)
	{
        $data = $this->convertToUW($request->all());
        $vehicle = $this->repository->create($data);
        $vehicle = $this->repository->attachThumbnail($vehicle, Input::file('thumbnail'));
        $vehicle = $this->repository->attachPictures($vehicle, Input::file('pictures'));
        $vehicle = $this->repository->attachBrochure($vehicle, Input::file('brochure'));
        flash()->success("Vehicle has been created successfully");
        return redirect(route('secure.vehicles.index'));
	}

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @internal param int $id
     * @return Response
     */
	public function show(Vehicle $vehicle)
	{
        return view('secure.vehicles.show', compact('vehicle'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vehicle $vehicle
     * @internal param int $id
     * @return Response
     */
	public function edit(Vehicle $vehicle)
	{
        $brands = $this->brandRepository->lists('name', 'id');
        return view('secure.vehicles.update', compact('vehicle', 'brands'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param VehicleRequest $request
     * @param Vehicle $vehicle
     * @internal param int $id
     * @return Response
     */
	public function update(VehicleRequest $request, Vehicle $vehicle)
	{
        $data = $this->convertToUW($request->all());
        $vehicle = $this->repository->update($vehicle, $data);
        $vehicle = $this->repository->attachThumbnail($vehicle, Input::file('thumbnail'));
        $vehicle = $this->repository->attachPictures($vehicle, Input::file('pictures'));
        $vehicle = $this->repository->attachBrochure($vehicle, Input::file('brochure'));
        flash()->success("Vehicle has been update successfully");
        return redirect(route('secure.vehicles.index'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicle $vehicle
     * @throws \Exception
     * @internal param int $id
     * @return Response
     */
	public function destroy(Vehicle $vehicle)
	{
        $vehicle->delete();
        flash()->success("Vehicle has been deleted successfully");
        return redirect(route('secure.vehicles.index'));
	}



    private function convertToUW($data) {
        foreach($data as $key => $value) {
            if($key == 'colour' || $key == 'transmission_type' || $key == 'fuel_type' || $key == 'body_type' || $key == 'drive_type') {
                $data[$key] = ucwords(strtolower($value));
            }
        }
        return $data;
    }

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $vehicles = $this->repository->regexSearch($request->all(),$size);
        Excel::create('Car-Mazic-Vehicles-List', function($excel) use ($vehicles) {
            $excel->sheet('Vehicles', function($sheet) use ($vehicles) {
                $sheet->loadView('secure.vehicles.export')->with('vehicles', $vehicles);
            });
        })->export('xlsx');
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function import()
    {
        return view('secure.vehicles.import');
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function imported(Request $request)
    {
        $success_count = 0;
        $failed_count = 0;
        $error_messages = array();

        $excel_files = Input::file('excel_file');
        if(!is_array($excel_files)) {
            $excel_files = array($excel_files);
        }
        foreach($excel_files as $excel_file) {
            if (isset($excel_file) && $excel_file->isValid()) {
                File::delete(storage_path('uploads/import/'. $excel_file->getClientOriginalName()));
                if(!File::exists(storage_path('uploads/import'))) {
                    File::makeDirectory(storage_path('uploads/import'), 0775, true);
                }
                File::copy($excel_file, storage_path('uploads/import/'. $excel_file->getClientOriginalName()));
				Excel::load($excel_file->getRealPath(), function($reader) use (&$success_count, &$failed_count, &$error_messages){
					$results = $reader->get();
					foreach ($results as $row) {
                        if(get_class($row) == CellCollection::class) {
                            $return_result  = $this->saveVehicle($row, null);
                            if(isset($return_result) && !empty($return_result) ) {
                                $error_messages[] = $return_result;
                                $failed_count++;
                            } else {
                                $success_count++;
                            }
                        } else {
                            foreach ($row as $col) {
                                $return_result  = $this->saveVehicle($col, null);
                                if(isset($return_result) && !empty($return_result) ) {
                                    $error_messages[] = $return_result;
                                    $failed_count++;
                                } else {
                                    $success_count++;
                                }
                            }
                        }
                    }
				});
                $messages[] = "<div>Total records successfully imported: <strong>$success_count</strong></div>";
                if($failed_count > 0) {
                    $messages[] = "<div>Total records failed to imported: <strong>$failed_count<strong></div>";
                    $messages[] = "<div><strong>Error Messages: </strong></div>";
                    $messages[] = '<ul><li>' . implode("</li><li>", array_unique($error_messages)) . '</li></ul>';
                }
                if($failed_count > 0) {
                    flash()->error(implode("", $messages));
                } else {
                    flash()->success(implode("", $messages));
                }
            } else {
                flash()->error("Please select correct excel file for uploading");
            }
        }
        return redirect(route('secure.vehicles.index'));
    }

    private function saveVehicle($record){
        $result_return = null;
        $brand = null;
        if(isset($record) && !empty($record->brand) && !empty($record->model) ) {
            $slug = Str::slug($record->brand);
            $brand = $this->brandRepository->findBySlug($slug);
            if (!isset($brand)) {
                $brand = $this->brandRepository->create([
                    'slug' => $slug,
                    'name' => ucwords($record->brand),
                ]);
            }
			$variant = '';
			if(!empty($record->variant)) {
				$variant = $record->variant;
			}
            $data = [
                'brand_id' => $brand->id,
                'bname' => $brand->name,
                'model' => $record->model,
                'variant' => $variant,
                'description' => $record->description,
                'transmission_type' => ucwords(strtolower($record->transmission_type)),
                'body_type' => ucwords(strtolower($record->body_type)),
                'fuel_type' => ucwords(strtolower($record->fuel_type)),
                'drive_type' => ucwords(strtolower($record->drive_type)),
                'price' => $record->price,
                'seating_capacity' => !empty($record->seating_capacity) ? $record->seating_capacity : 4,
                'engine_power' => $record->engine_power,
                'power_windows' => filter_var($record->power_windows, FILTER_VALIDATE_BOOLEAN),
                'abs' => filter_var($record->abs, FILTER_VALIDATE_BOOLEAN),
                'rear_defogger' => filter_var($record->rear_defogger, FILTER_VALIDATE_BOOLEAN),
                'inbuilt_music_system' => filter_var($record->inbuilt_music_system, FILTER_VALIDATE_BOOLEAN),
                'sunroof_moonroof' => filter_var($record->sunroof_moonroof, FILTER_VALIDATE_BOOLEAN),
                'anti_theft_immobilizer' => filter_var($record->anti_theft_immobilizer, FILTER_VALIDATE_BOOLEAN),
                'steering_mounted_controls' => filter_var($record->steering_mounted_controls, FILTER_VALIDATE_BOOLEAN),
                'rear_parking_sensors' => filter_var($record->rear_parking_sensors, FILTER_VALIDATE_BOOLEAN),
                'rear_wash_wiper' => filter_var($record->rear_wash_wiper, FILTER_VALIDATE_BOOLEAN),
                'seat_upholstery' => filter_var($record->seat_upholstery, FILTER_VALIDATE_BOOLEAN),
                'adjustable_steering' => filter_var($record->adjustable_steering, FILTER_VALIDATE_BOOLEAN),
                'status' => empty($record->status)? 'ACTIVE' : strtoupper($record->status),
            ];
            $brand_id   = $brand->id;
            $vehicle_id = $record->id;
            $validator = Validator::make($record->toArray(),
                [
                    'model'         => "required|unique:vehicles,model,$vehicle_id,id,brand_id,$brand_id,variant,$variant",
                ]
            );
            if (!$validator->fails()) {
                if (!empty($record->id)) {
                    $vehicle = $this->repository->find($record->id);
                }
                if (isset($vehicle)) {
                    $vehicle = $this->repository->update($vehicle, $data);
                } else {
                    $vehicle = $this->repository->create($data);
                }
                $result_return = "";
            } else {
                $result_return = "Vehicle with brand (" . $record->brand . "), model (" . $record->model . ") and variant (" . $record->variant . ") has already been used";
            }
        }
        return $result_return;
    }
}