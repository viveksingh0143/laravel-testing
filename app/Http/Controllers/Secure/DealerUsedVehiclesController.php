<?php namespace App\Http\Controllers\Secure;

use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UsedVehicleRequest;
use App\UsedVehicle;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class DealerUsedVehiclesController extends Controller {

    private $repository;
    private $vehicleRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(UsedVehicleRepository $repository, VehicleRepository $vehicleRepository) {
        $this->repository = $repository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, Dealer $dealer)
	{
        $delete_all_btn = $request->get('delete_all_btn');
        if(isset($delete_all_btn)) {
            $del_ids = $request->get('del_ids');
            if(isset($del_ids)) {
                $this->repository->destroy($del_ids);
            }
        }
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['dealer_id' => $dealer->id], $request->all());
        $used_vehicles = $this->repository->regexSearch($request, $size);
        return view('secure.used_vehicles.index', compact('dealer', 'used_vehicles', 'size'))->with('request', $request);
    }

    /**
     * Show the list for creating a new resource.
     *
     * @return Response
     */
    public function createForm(Request $request, Dealer $dealer, Vehicle $vehicle)
    {
        return view('secure.used_vehicles.create', compact('dealer', 'vehicle'));
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request, Dealer $dealer)
	{
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $vehicles = $this->vehicleRepository->regexSearch($request->all(), $size);
        return view('secure.used_vehicles.vehicle_list', compact('dealer', 'vehicles', 'size'))->with('request', $request->all());
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param UsedVehicleRequest $request
     * @param Dealer $dealer
     * @return Response
     */
	public function store(UsedVehicleRequest $request, Dealer $dealer)
	{
        $data = $this->convertToUW($request->all());
        $used_vehicle = $this->repository->create(array_merge(['dealer_id' => $dealer->id], $data));
        $used_vehicle = $this->repository->attachThumbnail($used_vehicle, Input::file('thumbnail'));
        $used_vehicle = $this->repository->attachPictures($used_vehicle, Input::file('pictures'));
        flash()->success("Used Vehicle has been attached successfully");
        return redirect(route('secure.dealers.used_vehicles.index', $dealer->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Dealer $dealer, UsedVehicle $used_vehicle)
	{
        return view('secure.used_vehicles.show', compact('dealer', 'used_vehicle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Dealer $dealer, UsedVehicle $used_vehicle)
	{
        $vehicle = $used_vehicle->vehicle;
        return view('secure.used_vehicles.update', compact('dealer', 'used_vehicle', 'vehicle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UsedVehicleRequest $request, Dealer $dealer, UsedVehicle $used_vehicle)
	{
        $data = $this->convertToUW($request->all());
        $used_vehicle = $this->repository->update($used_vehicle, $data);
        $used_vehicle = $this->repository->attachThumbnail($used_vehicle, Input::file('thumbnail'));
        $used_vehicle = $this->repository->attachPictures($used_vehicle, Input::file('pictures'));
        flash()->success("Used Vehicle has been update successfully");
        return redirect(route('secure.dealers.used_vehicles.index', $dealer->id));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Dealer $dealer
     * @param  int $id
     * @return Response
     */
	public function destroy(Dealer $dealer, UsedVehicle $used_vehicle)
	{
        $used_vehicle->delete();
        flash()->success("Used Vehicle has been deleted successfully");
        return redirect(route('secure.dealers.used_vehicles.index', $dealer->id));
	}

    private function convertToUW($data) {
        foreach($data as $key => $value) {
            if($key == 'colour' || $key == 'transmission_type' || $key == 'fuel_type' || $key == 'state' || $key == 'city' || $key == 'location') {
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
    public function export(Request $request, Dealer $dealer)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['dealer_id' => $dealer->id], $request->all());
        $used_vehicles = $this->repository->regexSearch($request, $size);
        Excel::create($dealer->name . '-Used-Vehicles-List', function($excel) use ($used_vehicles) {
            $excel->sheet('Used Vehicles', function($sheet) use ($used_vehicles) {
                $sheet->loadView('secure.used_vehicles.export')->with('used_vehicles', $used_vehicles);
            });
        })->export('xlsx');
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function import(Dealer $dealer)
    {
        return view('secure.used_vehicles.import', compact('dealer'));
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function imported(Request $request, Dealer $dealer)
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
				Excel::load($excel_file->getRealPath(), function($reader) use($dealer, &$success_count, &$failed_count, &$error_messages) {
					$results = $reader->get();
					foreach ($results as $row) {
                        if(get_class($row) == CellCollection::class) {
                            $return_result  = $this->saveUsedVehicle($row, $dealer);
                            if(isset($return_result) && !empty($return_result) ) {
                                $error_messages[] = $return_result;
                                $failed_count++;
                            } else {
                                $success_count++;
                            }
                        } else {
                            foreach ($row as $col) {
                                $return_result  = $this->saveUsedVehicle($col, $dealer);
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
		//return view('secure.used_vehicles.import', compact('dealer'));
        return redirect(route('secure.dealers.used_vehicles.index', $dealer->id));
    }

    private function saveUsedVehicle($record, $dealer) {
        $vehicle = null;
		$variant = '';
        $result_return = null;
		if(!empty($record->variant)) {
			$variant = $record->variant;
		}
        if(!empty($record->brand) && !empty($record->model)) {
            $vehicle = $this->vehicleRepository->findByBrandModelVariant($record->brand, $record->model, $variant, false);
        }
        if(isset($vehicle)) {
            $data = [
                'dealer_id'         => $dealer->id,
                'vehicle_id'        => $vehicle->id,
                'colour'            => ucwords(strtolower($record->colour)),
                'transmission_type' => ucwords(strtolower(empty($record->transmission_type)? $vehicle->transmission_type : $record->transmission_type)),
                'fuel_type'         => ucwords(strtolower(empty($record->fuel_type)? $vehicle->fuel_type : $record->fuel_type)),
                'model_year'        => $record->model_year,
                'kilometers'        => $record->kilometers,
				'registered_at'		=> $record->registered_at,
                'price'             => $record->price,
                'insurance'         => filter_var($record->insurance, FILTER_VALIDATE_BOOLEAN),
                'state'             => ucwords(strtolower(empty($record->state)? $dealer->state : $record->state)),
                'city'              => ucwords(strtolower(empty($record->city)? $dealer->city : $record->city)),
                'location'          => ucwords(strtolower(empty($record->location)? $dealer->location : $record->location)),
                'address'           => empty($record->address)? $dealer->address : $record->address,
                'pincode'           => empty($record->pincode)? $dealer->pincode : $record->pincode,
                'status'            => empty($record->status)? 'ACTIVE' : strtoupper($record->status),
            ];
            if (!empty($record->id)) {
                $used_vehicle = $this->repository->find($record->id);
            }
            if (isset($used_vehicle)) {
                $used_vehicle = $this->repository->update($used_vehicle, $data);
            } else {
                $used_vehicle = $this->repository->create($data);
            }
            $result_return = "";
        } else {
            $result_return = "No vehicle found with brand (" . $record->brand . "), model (" . $record->model . ") and variant (" . $record->variant . ")";
        }
        return $result_return;
    }
}
