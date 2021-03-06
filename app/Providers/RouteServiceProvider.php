<?php namespace App\Providers;

use App\AppKey;
use App\Brand;
use App\Comment;
use App\Dealer;
use App\Inventory;
use App\Lead;
use App\NewVehicle;
use App\OnRoadPrice;
use App\Page;
use App\Picture;
use App\Post;
use App\UsedVehicle;
use App\User;
use App\Vehicle;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
        $router->model('leads', Lead::class);
        $router->model('users', User::class);
        $router->model('pictures', Picture::class);
        $router->model('comments', Comment::class);
        $router->model('posts', Post::class);
        $router->model('pages', Page::class);
        $router->model('brands', Brand::class);
        $router->model('vehicles', Vehicle::class);
        $router->model('dealers', Dealer::class);
        $router->model('new_vehicles', NewVehicle::class);
        $router->model('used_vehicles', UsedVehicle::class);
		$router->model('inventories', Inventory::class);
        $router->model('on_road_prices', OnRoadPrice::class);
		$router->model('app_keys', AppKey::class);

        /*$router->model('dealers', Dealer::class);*/
        /*$router->model('new_vehicles', NewVehicle');*/

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
