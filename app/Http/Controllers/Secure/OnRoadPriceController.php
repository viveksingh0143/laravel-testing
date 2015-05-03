<?php namespace App\Http\Controllers\Secure;

use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\OnRoadPriceRequest;
use App\OnRoadPrice;
use App\Repositories\OnRoadPriceRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class OnRoadPriceController extends Controller {

    private $repository;
    private $vehicleRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(OnRoadPriceRepository $repository, VehicleRepository $vehicleRepository) {
        $this->repository = $repository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
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
        $request = $request->all();
        $on_road_prices = $this->repository->regexSearch($request, $size);
        return view('secure.on_road_prices.index', compact('on_road_prices', 'size'))->with('request', $request);
    }

    /**
     * Show the list for creating a new resource.
     *
     * @return Response
     */
    public function createForm(Request $request, Vehicle $vehicle)
    {
        return view('secure.on_road_prices.create', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $vehicles = $this->vehicleRepository->regexSearch($request->all(), $size);
        return view('secure.on_road_prices.vehicle_list', compact('vehicles', 'size'))->with('request', $request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OnRoadPriceRequest $request
     * @param Dealer $dealer
     * @return Response
     */
    public function store(OnRoadPriceRequest $request)
    {
        $on_road_price = $this->repository->create($request->all());
        flash()->success("On road price created successfully");
        return redirect(route('secure.on-road-prices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(OnRoadPrice $on_road_price)
    {
        return view('secure.on_road_prices.show', compact('on_road_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(OnRoadPrice $on_road_price)
    {
        $vehicle = $on_road_price->vehicle;
        return view('secure.on_road_prices.update', compact('on_road_price', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(OnRoadPriceRequest $request, OnRoadPrice $on_road_price)
    {
        $vehicle = $this->repository->update($on_road_price, $request->all());
        flash()->success("On road price has been update successfully");
        return redirect(route('secure.on-road-prices.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dealer $dealer
     * @param  int $id
     * @return Response
     */
    public function destroy(OnRoadPrice $on_road_price)
    {
        $on_road_price->delete();
        flash()->success("On road price has been deleted successfully");
        return redirect(route('secure.on-road-prices.index'));
    }

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = $request->all();
        $on_road_prices = $this->repository->regexSearch($request, $size);
        Excel::create('On-Road-Price-List', function($excel) use ($on_road_prices) {
            $excel->sheet('Price List', function($sheet) use ($on_road_prices) {
                $sheet->loadView('secure.on_road_prices.export')->with('on_road_prices', $on_road_prices);
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
        return view('secure.on_road_prices.import');
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
                Excel::load($excel_file->getRealPath(), function($reader) use(&$success_count, &$failed_count, &$error_messages) {
                    $results = $reader->get();
                    foreach ($results as $row) {
                        if(get_class($row) == CellCollection::class) {
                            $return_result  = $this->saveOnRoadPrice($row);
                            if(isset($return_result) && !empty($return_result) ) {
                                $error_messages[] = $return_result;
                                $failed_count++;
                            } else {
                                $success_count++;
                            }
                        } else {
                            foreach ($row as $col) {
                                $return_result  = $this->saveOnRoadPrice($col);
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
        return redirect(route('secure.on-road-prices.index'));
    }

    private function saveOnRoadPrice($record) {
        $result_return = null;
        $vehicle = null;
        if(!empty($record->brand) && !empty($record->model)) {
            $vehicle = $this->vehicleRepository->findByBrandModelVariant($record->brand, $record->model, $record->variant, false);
            if (isset($vehicle)) {
                $data = [
                    'vehicle_id' => $vehicle->id,
                    'type' => $record->extra_variant,
                    'state' => $record->state,
                    'ex_show_room_price' => $record->ex_showroom_price,
                    'registration_charge' => $record->regn_tax_no_plate_charges,
                    'insurance_charge' => $record->comp_insurance_with_0_dep_cover,
                    'warehouse_charge' => $record->warehouse_handling_charges,
                    'extended_warranty_charge' => $record->extended_warranty_for_2_years,
                    'body_care_charge' => $record->body_care_package,
                    'essential_kit_charge' => $record->essential_accessories_kit,
                ];
                if (!empty($record->id)) {
                    $on_road_price = $this->repository->find($record->id);
                }
                if (isset($on_road_price)) {
                    $on_road_price = $this->repository->update($on_road_price, $data);
                } else {
                    $on_road_price = $this->repository->create($data);
                }
                $result_return = "";
            } else {
                $result_return = "No vehicle found with brand (" . $record->brand . "), model (" . $record->model . ") and variant (" . $record->variant . ")";
            }
        }
        return $result_return;
    }
}