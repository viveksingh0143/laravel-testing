<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use App\UsedVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UsedCarAPIController extends Controller {
    private $repository;
    private $brandRepository;
    private $vehicleRepository;

    /*
	|--------------------------------------------------------------------------
	| Vehicle Search Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

    /**
     * @param UsedVehicleRepository|VehicleRepository $repository
     * @param BrandRepository $brandRepository
     * @param VehicleRepository $vehicleRepository
     */
    function __construct(UsedVehicleRepository $repository, BrandRepository $brandRepository, VehicleRepository $vehicleRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
        $this->vehicleRepository = $vehicleRepository;
        //$this->middleware('guest');
    }



	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $brands  = $this->brandRepository->lists('name', 'name');
        $colours = $this->repository->lists('colour', 'colour');
        $states = $this->repository->lists('state', 'state');

        $transmission_types = $this->vehicleRepository->lists('transmission_type', 'transmission_type');
        $body_types         = $this->vehicleRepository->lists('body_type', 'body_type');
        $fuel_types         = $this->vehicleRepository->lists('fuel_type', 'fuel_type');
        $drive_types        = $this->vehicleRepository->lists('drive_type', 'drive_type');

        $bnames_selected = $request->get('bname');
        $models_selected = $request->get('model');
        $states_selected = $request->get('state');
        $cities_selected = $request->get('city');


        if(isset($bnames_selected)) {
            $models = $this->vehicleRepository->lists('model', 'model', ['bname' => $bnames_selected, 'status' => 'ACTIVE']);
        }
        if(isset($bnames_selected, $models_selected)) {
            $variants = $this->vehicleRepository->lists('variant', 'variant', ['bname' => $bnames_selected, 'model' => $models_selected, 'status' => 'ACTIVE']);
        }
        if(isset($states_selected)) {
            $cities = $this->repository->lists('city', 'city', ['state' => $states_selected, 'status' => 'ACTIVE']);
        }
        if(isset($states_selected, $cities_selected)) {
            $locations = $this->repository->lists('location', 'location', ['state' => $states_selected, 'city' => $cities_selected, 'status' => 'ACTIVE']);
        }

        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $sorts = array();
        $psort = $request->get('psort');
        $ysort = $request->get('ysort');
        if(!empty($psort)) {$sorts['used_vehicles.price'] = $psort;}
        if(!empty($ysort)) {$sorts['used_vehicles.model_year'] = $ysort;}
        $sorts = array_merge($sorts, [
                'vehicles.bname'            => 'asc',
                'vehicles.model'            => 'asc',
                'vehicles.variant'          => 'asc'
        ]);
        $used_vehicles = $this->repository->searchFrontend(array_merge(['status' => 'ACTIVE'], $request->all()), $size, $sorts);
        return $used_vehicles;
	}
}
