<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;

class HomeController extends Controller {
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

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $colours            = $this->usedVehicleRepository->lists('colour', 'colour', ['status' => 'ACTIVE']);
        $states             = $this->usedVehicleRepository->lists('state', 'state', ['status' => 'ACTIVE']);
        $fuel_types         = $this->vehicleRepository->lists('fuel_type', 'fuel_type',                 ['status' => 'ACTIVE']);
        $transmission_types = $this->vehicleRepository->lists('transmission_type', 'transmission_type', ['status' => 'ACTIVE']);

        $blogPosts = Post::where('status', 'ACTIVE')->where('thumbnail', '<>', '')->latest()->paginate(12);
		return view('frontend.home', compact('colours', 'states', 'fuel_types', 'transmission_types', 'blogPosts'));
	}
}
