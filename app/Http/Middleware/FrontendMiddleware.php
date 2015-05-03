<?php namespace App\Http\Middleware;

use App\Repositories\BrandRepository;
use Closure;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class FrontendMiddleware {

    private $brandRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository          = $brandRepository;
        //$this->middleware('guest');
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $current_year = Carbon::now()->year;
		$brands             = $this->brandRepository->lists('name', 'name', ['status' => 'ACTIVE']);
        View::share('brands', $brands);
		View::share('current_year', $current_year);
		return $next($request);
	}

}
