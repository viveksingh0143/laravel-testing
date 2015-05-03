<?php namespace App\Http\Middleware;

use App\UsedVehicle;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CompareMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $ready_to_compare = Session::get('used_vehicle_compare', []);
        View::share('ready_to_compare', $ready_to_compare);
        $more_compare = !(count($ready_to_compare) < 3);
        View::share('more_compare', $more_compare);
        if($ready_to_compare > 0) {
            $used_compare_compare_selected = UsedVehicle::with('vehicle')->where('status', 'ACTIVE')->whereIn('id', $ready_to_compare)->get();
        }
        View::share('used_compare_compare_selected', $used_compare_compare_selected);
		return $next($request);
	}

}
