<?php namespace App\Http\Controllers;

use App\Dealer;
use App\Lead;
use App\UsedVehicle;
use App\Vehicle;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Guard $auth)
	{
		$used_vehicle_count = UsedVehicle::where('status', 'ACTIVE')->count();
		$new_vehicle_count = Vehicle::where('status', 'ACTIVE')->count();
		$dealer_count = Dealer::where('status', 'ACTIVE')->count();
		$notification_count = Lead::where('status', 'ACTIVE')->whereNotNull('owner_id')->count();
		$user = $auth->user();
		if($user->role == 'DEALER') {
            $dealer = $user->dealer;
            if($dealer) {
                return view('dealer.dashboard', compact('used_vehicle_count', 'dealer_count', 'new_vehicle_count', 'notification_count', 'dealer'));
            } else {
                return view('dealer.no-dashboard', compact('used_vehicle_count', 'dealer_count', 'new_vehicle_count', 'notification_count', 'dealer'));
            }
		} elseif($user->role == 'ADMIN') {
			return view('secure.dashboard', compact('used_vehicle_count', 'dealer_count', 'new_vehicle_count', 'notification_count'));
		} else {
			return view('dashboard');
		}
	}

}
