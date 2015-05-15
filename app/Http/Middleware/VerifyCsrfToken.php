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
					'api/used-car',
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
