<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\UsedVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller {
	/**
	 *
	 * @return Response
	 */
	public function pushUsedVehicleCompare($id)
	{
        Session::push('used_vehicle_compare', $id);
        return Redirect::back();
	}

    public function popUsedVehicleCompare($id)
    {
        if (Session::has('used_vehicle_compare'))
        {
            $value = Session::get('used_vehicle_compare', []);
            if(($key = array_search($id, $value)) !== false) {
                unset($value[$key]);
            }
            Session::put('used_vehicle_compare', $value);
        }
        return Redirect::back();
    }

    /**
     *
     * @param Request $request
     * @return Response
     */
    public function usedVehicleCompare(Request $request)
    {
        $ids = $request->get('ids');
        $used_vehicles_compare = [];
        if(!empty($ids)) {
            $used_vehicles_compare = UsedVehicle::with('vehicle')->where('status', 'ACTIVE')->whereIn('id', $ids)->get();
        }
        if (Session::has('used_vehicle_compare')) {
            Session::forget('used_vehicle_compare');
        }
        return view('frontend.used_vehicle_compare', compact('used_vehicles_compare'))->with('used_compare_compare_selected', null);
    }
}
