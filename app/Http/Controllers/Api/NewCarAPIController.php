<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use App\UsedVehicle;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class NewCarAPIController extends Controller {
    private $repository;
    private $brandRepository;

    /**
     * @param VehicleRepository $repository
     * @param BrandRepository $brandRepository
     */
    function __construct(VehicleRepository $repository, BrandRepository $brandRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
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
        $sorts = array_merge($sorts, [
                'vehicles.bname'            => 'asc',
                'vehicles.model'            => 'asc',
                'vehicles.variant'          => 'asc'
        ]);
        $new_vehicles = $this->repository->searchFrontend(array_merge(['status' => 'ACTIVE'], $request->all()), $size, $sorts);
        return $new_vehicles;
	}

    public function show($id)
    {
        return Vehicle::with('brand', 'pictures')->find($id);
    }
}
