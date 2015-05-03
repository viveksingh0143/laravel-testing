<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;

class CommonController extends Controller {
    private $vehicleRepository;
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
	public function __construct(VehicleRepository $vehicleRepository, UsedVehicleRepository $usedVehicleRepository)
	{
        $this->vehicleRepository        = $vehicleRepository;
        $this->usedVehicleRepository    = $usedVehicleRepository;
		//$this->middleware('guest');
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

    public function cities(Request $request) {
        $state = $request->get('state');
        if(!empty($brand)) {
            $data = $this->vehicleRepository->lists('city', 'city', ['state' => $state, 'status' => 'ACTIVE']);
            return $data;
        } else {
            return [];
        }
    }

    public function locations(Request $request) {
        $state = $request->get('state');
        $city = $request->get('city');
        if(!empty($state) && !empty($city)) {
            return $this->vehicleRepository->lists('location', 'location', ['state' => $state, 'city' => $city, 'status' => 'ACTIVE']);
        } else {
            return [];
        }
    }
}
