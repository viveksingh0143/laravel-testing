<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //disable CSRF check on following routes
  		$skip = array(
            'api/brands',
            'api/models',
            'api/variants',
            'api/states',
            'api/cities',
            'api/locations',
            'api/used-car',
            'api/used-car/{id}',
            'api/new-car',
            'api/new-car/{id}',
            'api/dealer',
            'api/dealer/{id}',
            'api/notifications',
            'api/notifications',
            'api/registered',
            'api/check/api',
            'api/authenticate'
		);
		foreach ($skip as $key => $route) {
			if($request->is($route)){
				return parent::addCookieToResponse($request, $next($request)
				->header('Access-Control-Allow-Origin' , '*')
				->header('Access-Control-Allow-Credentials', 'true')
				->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
				->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With')	
				);
			}
		}
		return parent::handle($request, $next);
	}

}
