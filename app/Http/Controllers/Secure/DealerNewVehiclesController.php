<?php namespace App\Http\Controllers\Secure;

use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\NewVehicleRequest;
use App\NewVehicle;
use App\Repositories\NewVehicleRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class DealerNewVehiclesController extends Controller {

    private $repository;
    private $vehicleRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(NewVehicleRepository $repository, VehicleRepository $vehicleRepository) {
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
        $new_vehicles = $this->repository->regexSearch($request, $size);
        return view('secure.new_vehicles.index', compact('dealer', 'new_vehicles', 'size'))->with('request', $request);
    }

    /**
     * Show the list for creating a new resource.
     *
     * @return Response
     */
    public function createForm(Request $request, Dealer $dealer, Vehicle $vehicle)
    {
        return view('secure.new_vehicles.create', compact('dealer', 'vehicle'));
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
        return view('secure.new_vehicles.vehicle_list', compact('dealer', 'vehicles', 'size'))->with('request', $request->all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NewVehicleRequest $request, Dealer $dealer)
	{
        $new_vehicle = $this->repository->create(array_merge(['dealer_id' => $dealer->id], $request->all()));
        flash()->success("New Vehicle has been attached successfully");
        return redirect(route('secure.dealers.new_vehicles.index', $dealer->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Dealer $dealer, NewVehicle $new_vehicle)
	{
        return view('secure.new_vehicles.show', compact('dealer', 'new_vehicle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Dealer $dealer, NewVehicle $new_vehicle)
	{
        $vehicle = $new_vehicle->vehicle;
        return view('secure.new_vehicles.update', compact('dealer', 'new_vehicle', 'vehicle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(NewVehicleRequest $request, Dealer $dealer, NewVehicle $new_vehicle)
	{
        $vehicle = $this->repository->update($new_vehicle, $request->all());
        flash()->success("New Vehicle has been update successfully");
        return redirect(route('secure.dealers.new_vehicles.index', $dealer->id));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Dealer $dealer
     * @param  int $id
     * @return Response
     */
	public function destroy(Dealer $dealer, NewVehicle $new_vehicle)
	{
        $new_vehicle->delete();
        flash()->success("New Vehicle has been deleted successfully");
        return redirect(route('secure.dealers.new_vehicles.index', $dealer->id));
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
        $new_vehicles = $this->repository->regexSearch($request, $size);
        Excel::create($dealer->name . '-New-Vehicles-List', function($excel) use ($new_vehicles) {
            $excel->sheet('New Vehicles', function($sheet) use ($new_vehicles) {
                $sheet->loadView('secure.new_vehicles.export')->with('new_vehicles', $new_vehicles);
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
        return view('secure.new_vehicles.import', compact('dealer'));
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
                Excel::load($excel_file->getRealPath(), function($reader)  use($dealer, &$success_count, &$failed_count, &$error_messages) {
					$results = $reader->get();
					foreach ($results as $row) {
                        if(get_class($row) == CellCollection::class) {
                            $return_result  = $this->saveNewVehicle($row, $dealer);
                            if(isset($return_result) && !empty($return_result) ) {
                                $error_messages[] = $return_result;
                                $failed_count++;
                            } else {
                                $success_count++;
                            }
                        } else {
                            foreach ($row as $col) {
                                $return_result  = $this->saveNewVehicle($col, $dealer);
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
        return redirect(route('secure.dealers.new_vehicles.index', $dealer->id));
    }

    private function saveNewVehicle($record, $dealer) {
        $result_return = null;
        $vehicle = null;
        if(!empty($record->brand) && !empty($record->model)) {
            $vehicle = $this->vehicleRepository->findByBrandModelVariant($record->brand, $record->model, $record->variant, false);
        }
        if(isset($vehicle)) {
            $data = [
                'dealer_id'         => $dealer->id,
                'vehicle_id'        => $vehicle->id,
                'price'             => $record->price,
                'status'            => empty($record->status)? 'ACTIVE' : strtoupper($record->status),
            ];
            if (!empty($record->id)) {
                $new_vehicle = $this->repository->find($record->id);
            }
            if (isset($new_vehicle)) {
                $new_vehicle = $this->repository->update($new_vehicle, $data);
            } else {
                $new_vehicle = $this->repository->create($data);
            }
            $result_return = "";
        } else {
            $result_return = "No vehicle found with brand (" . $record->brand . "), model (" . $record->model . ") and variant (" . $record->variant . ")";
        }
        return $result_return;
    }
}
