<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;

class CommonController extends Controller {
    private $vehicleRepository;
    private $brandRepository;
    private $usedVehicleRepository;
	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(BrandRepository $brandRepository, VehicleRepository $vehicleRepository, UsedVehicleRepository $usedVehicleRepository)
	{
        $this->brandRepository          = $brandRepository;
        $this->vehicleRepository        = $vehicleRepository;
        $this->usedVehicleRepository    = $usedVehicleRepository;
		//$this->middleware('guest');
	}

    public function brands() {
        return $this->brandRepository->lists('name', 'name');
    }

    public function models(Request $request) {
        $brand = $request->get('brand');
        if(!empty($brand)) {
            $data = $this->vehicleRepository->lists('model', 'model', ['bname' => $brand, 'status' => 'ACTIVE']);
            return $data;
        } else {
            return [];
        }
    }

    public function variants(Request $request) {
        $brand = $request->get('brand');
        $model = $request->get('model');
        if(!empty($brand) && !empty($model)) {
            return $this->vehicleRepository->lists('variant', 'variant', ['bname' => $brand, 'model' => $model, 'status' => 'ACTIVE']);
        } else {
            return [];
        }
    }

    public function states() {
        return $this->usedVehicleRepository->lists('state', 'state', ['status' => 'ACTIVE']);
    }

    public function cities(Request $request) {
        $state = $request->get('state');
        if(!empty($state)) {
            $data = $this->usedVehicleRepository->lists('city', 'city', ['state' => $state, 'status' => 'ACTIVE']);
            return $data;
        } else {
            return [];
        }
    }

    public function locations(Request $request) {
        $state = $request->get('state');
        $city = $request->get('city');
        if(!empty($state) && !empty($city)) {
            return $this->usedVehicleRepository->lists('location', 'location', ['state' => $state, 'city' => $city, 'status' => 'ACTIVE']);
        } else {
            return [];
        }
    }
}
