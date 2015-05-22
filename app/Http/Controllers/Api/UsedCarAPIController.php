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

    public function show($id)
    {
        return UsedVehicle::with('dealer', 'pictures', 'vehicle', 'vehicle.brand', 'vehicle.pictures')->find($id);
    }
}
