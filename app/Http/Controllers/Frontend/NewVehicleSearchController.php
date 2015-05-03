<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use App\UsedVehicle;
use App\Vehicle;
use Illuminate\Http\Request;

class NewVehicleSearchController extends Controller {
    private $repository;
    private $brandRepository;

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
    function __construct(VehicleRepository $repository, BrandRepository $brandRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
    }



	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $brands  = $this->brandRepository->lists('name', 'name');
        $transmission_types = $this->repository->lists('transmission_type', 'transmission_type');
        $body_types         = $this->repository->lists('body_type', 'body_type');
        $fuel_types         = $this->repository->lists('fuel_type', 'fuel_type');
        $drive_types        = $this->repository->lists('drive_type', 'drive_type');

        $bnames_selected = $request->get('bname');
        $models_selected = $request->get('model');

        if(isset($bnames_selected)) {
            $models = $this->repository->lists('model', 'model', ['bname' => $bnames_selected, 'status' => 'ACTIVE']);
        }
        if(isset($bnames_selected, $models_selected)) {
            $variants = $this->repository->lists('variant', 'variant', ['bname' => $bnames_selected, 'model' => $models_selected, 'status' => 'ACTIVE']);
        }

        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $sorts = array();
        $psort = $request->get('psort');
        if(!empty($psort)) {$sorts['vehicles.price'] = $psort;}
        $sorts = array_merge($sorts, [
                'vehicles.bname'            => 'asc',
                'vehicles.model'            => 'asc',
                'vehicles.variant'          => 'asc'
        ]);
        $vehicles = $this->repository->searchFrontend(array_merge(['status' => 'ACTIVE'], $request->all()), $size, $sorts);
        return view('frontend.new_vehicle_search', compact('vehicles', 'brands', 'models', 'variants', 'transmission_types', 'body_types', 'fuel_types', 'drive_types', 'size'))->with('request', $request->all());
	}

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function show(Request $request, $id, $slug)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('frontend.new_vehicle_details', compact('vehicle'));
    }

}
