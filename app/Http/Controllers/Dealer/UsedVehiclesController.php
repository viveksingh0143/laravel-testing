<?php namespace App\Http\Controllers\Dealer;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UsedVehicleRequest;
use App\Http\Requests\VehicleRequest;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use App\UsedVehicle;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Maatwebsite\Excel\Collections\CellCollection;
use Maatwebsite\Excel\Facades\Excel;

class UsedVehiclesController extends Controller {

    private $repository;
    private $brandRepository;
    private $vehicleRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(UsedVehicleRepository $repository, BrandRepository $brandRepository, VehicleRepository $vehicleRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['status' => 'ACTIVE'], $request->all());
        $used_vehicles = $this->repository->regexSearchFrontend($request, $size, ['used_vehicles.model_year' => 'asc', 'vehicles.bname' => 'asc', 'vehicles.model' => 'asc', 'vehicles.variant' => 'asc']);
        return view('dealer.used_vehicles.index', compact('used_vehicles', 'size'))->with('request', $request);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function myVehicles(Request $request)
    {
        $dealers = Auth::user()->dealers;
        if (isset($dealers) && count($dealers) > 0) {
            $dealer = $dealers[0];
        }
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $used_vehicles = [];
        if (isset($dealer)) {
            $request = array_merge(['status' => 'ACTIVE', 'dealer_id' => $dealer->id], $request->all());
            $used_vehicles = $this->repository->regexSearchFrontend($request, $size, ['used_vehicles.model_year' => 'asc', 'vehicles.bname' => 'asc', 'vehicles.model' => 'asc', 'vehicles.variant' => 'asc']);
        }
        return view('dealer.used_vehicles.mine', compact('used_vehicles', 'size'))->with('request', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(UsedVehicle $used_vehicle)
    {
        return view('dealer.used_vehicles.show', compact('used_vehicle'));
    }


    /**
     * Show the list for creating a new resource.
     *
     * @return Response
     */
    public function createForm(Request $request, Vehicle $vehicle)
    {
        return view('dealer.used_vehicles.create', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['status' => 'ACTIVE'], $request->all());
        $vehicles = $this->vehicleRepository->regexSearch($request, $size);
        return view('dealer.used_vehicles.vehicle_list', compact('vehicles', 'size'))->with('request', $request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsedVehicleRequest $request
     * @param Dealer $dealer
     * @return Response
     */
    public function store(UsedVehicleRequest $request)
    {
        $dealers = Auth::user()->dealers;
        if(isset($dealers) && count($dealers) > 0) {
            $dealer = $dealers[0];
            $used_vehicle = $this->repository->create(array_merge(['dealer_id' => $dealer->id], $request->all()));
            $used_vehicle = $this->repository->attachThumbnail($used_vehicle, Input::file('thumbnail'));
            $used_vehicle = $this->repository->attachPictures($used_vehicle, Input::file('pictures'));
            flash()->success("Used Vehicle has been attached successfully");
            return redirect(route('dealer-area.used_vehicles.index'));
        } else {
            return redirect(route('dealer-area.used_vehicles.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(UsedVehicle $used_vehicle)
    {
        $vehicle = $used_vehicle->vehicle;
        return view('dealer.used_vehicles.update', compact('used_vehicle', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UsedVehicleRequest $request, UsedVehicle $used_vehicle)
    {
        $used_vehicle = $this->repository->update($used_vehicle, $request->all());
        $used_vehicle = $this->repository->attachThumbnail($used_vehicle, Input::file('thumbnail'));
        $used_vehicle = $this->repository->attachPictures($used_vehicle, Input::file('pictures'));
        flash()->success("Used Vehicle has been update successfully");
        return redirect(route('dealer-area.used_vehicles.myVehicles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dealer $dealer
     * @param  int $id
     * @return Response
     */
    public function destroy(UsedVehicle $used_vehicle)
    {
        $used_vehicle->delete();
        flash()->success("Used Vehicle has been deleted successfully");
        return redirect(route('dealer-area.used_vehicles.myVehicles'));
    }
}