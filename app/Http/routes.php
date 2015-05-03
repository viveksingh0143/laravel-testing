<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api'], function() {
    Route::get('/models',       'Api\CommonController@models');
    Route::get('/variants',     'Api\CommonController@variants');
    Route::get('/cities',       'Api\CommonController@cities');
    Route::get('/locations',    'Api\CommonController@locations');
});

Route::group(['middleware' => ['frontend', 'compare']], function() {
    Route::get('/', 'Frontend\HomeController@index');

    Route::get('/used-vehicle/need-compare',                    ['as' => 'used-vehicle-compare',        'uses' => 'Frontend\SessionsController@usedVehicleCompare']);
    Route::get('/used-vehicle/need-compare-pop/{id}',           ['as' => 'used-vehicle-compare-pop',    'uses' => 'Frontend\SessionsController@popUsedVehicleCompare']);
    Route::get('/used-vehicle/need-compare-push/{id}',          ['as' => 'used-vehicle-compare-push',   'uses' => 'Frontend\SessionsController@pushUsedVehicleCompare']);
    Route::get('/used-vehicle-search',                          ['as' => 'used-vehicle-search',         'uses' => 'Frontend\UsedVehicleSearchController@index']);
    Route::get('/used-vehicle/seller-details/{id}/{slug}',      ['as' => 'used-vehicle-seller-details', 'uses' => 'Frontend\ContactUsController@getSellerDetails']);
    Route::get('/used-vehicle-details/{id}/{slug}',             ['as' => 'used-vehicle-details',        'uses' => 'Frontend\UsedVehicleSearchController@show']);
    Route::get('/brands/{brand}/used-vehicles',                 ['as' => 'brand-used-vehicle',          'uses' => 'Frontend\UsedVehicleSearchController@brand']);


    Route::get('/new-vehicle-search',                           ['as' => 'new-vehicle-search',          'uses' => 'Frontend\NewVehicleSearchController@index']);
    Route::get('/new-vehicle-details/{id}/{slug}',              ['as' => 'new-vehicle-details',         'uses' => 'Frontend\NewVehicleSearchController@show']);

    Route::get('/list-all-brands',                              ['as' => 'brand-list',                  'uses' => 'Frontend\BrandListController@index']);


    Route::post('/contact-us/get-the-best-deal',                 ['as' => 'contact-us-best-deal',       'uses' => 'Frontend\ContactUsController@bestDeal']);

    Route::get('/pages/list',                                    ['as' => 'frontend.pages.list',        'uses' => 'Frontend\PageController@index']);
    Route::get('/pages/{slug}',                                  ['as' => 'frontend.pages.show',        'uses' => 'Frontend\PageController@show']);

    Route::get('/posts/list',                                    ['as' => 'frontend.posts.list',        'uses' => 'Frontend\PostController@index']);
    Route::get('/posts/{slug}',                                  ['as' => 'frontend.posts.show',        'uses' => 'Frontend\PostController@show']);


    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get('/on-road-prices',                               ['as' => 'frontend.on-road-prices.index','uses' => 'Frontend\OnRoadPriceController@index']);
	
	Route::get('/dealer-list',                                  ['as' => 'dealer-list',                 'uses' => 'Frontend\DealerController@index']);
	Route::get('/{dealer_slug}',                                ['as' => 'dealer-page',                 'uses' => 'Frontend\DealerController@show']);

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function() {
        Route::get('/profile',          ['as' => 'dashboard.users.profile',          'uses' => 'Secure\UsersController@profile']);
        Route::post('/profile',         ['as' => 'dashboard.users.profile_update',   'uses' => 'Secure\UsersController@updateProfile']);
    });
});



Route::get('/dashboard/home', 'DashboardController@index');

Route::group(['prefix' => 'secure', 'middleware' => ['auth']], function() {
    Route::get('/users/export',         ['as' => 'secure.users.export',     'uses' => 'Secure\UsersController@export']);
    Route::resource('users',                                                          'Secure\UsersController');

    Route::get('/posts/export',         ['as' => 'secure.posts.export',     'uses' => 'Secure\PostsController@export']);
    Route::resource('posts',                                                          'Secure\PostsController');

    Route::get('/pages/export',         ['as' => 'secure.pages.export',     'uses' => 'Secure\PagesController@export']);
    Route::resource('pages',                                                          'Secure\PagesController');

    Route::get('/brands/export',        ['as' => 'secure.brands.export',    'uses' => 'Secure\BrandsController@export']);
    Route::resource('brands',                                                         'Secure\BrandsController');

    Route::get('/vehicles/export',      ['as' => 'secure.vehicles.export',  'uses' => 'Secure\VehiclesController@export']);
    Route::get('/vehicles/import',      ['as' => 'secure.vehicles.import',  'uses' => 'Secure\VehiclesController@import']);
    Route::post('/vehicles/import',     ['as' => 'secure.vehicles.imported','uses' => 'Secure\VehiclesController@imported']);
    Route::resource('vehicles',                                                       'Secure\VehiclesController');

    Route::get('/dealers/export',       ['as' => 'secure.dealers.export',   'uses' => 'Secure\DealersController@export']);
    Route::get('/dealers/import',       ['as' => 'secure.dealers.import',   'uses' => 'Secure\DealersController@import']);
    Route::post('/dealers/import',      ['as' => 'secure.dealers.imported', 'uses' => 'Secure\DealersController@imported']);
    Route::resource('dealers',                                                        'Secure\DealersController');

    Route::get('/dealers/{dealers}/new_vehicles/export',                ['as' => 'secure.dealers.new_vehicles.export',          'uses' => 'Secure\DealerNewVehiclesController@export']);
    Route::get('/dealers/{dealers}/new_vehicles/import',                ['as' => 'secure.dealers.new_vehicles.import',          'uses' => 'Secure\DealerNewVehiclesController@import']);
    Route::post('/dealers/{dealers}/new_vehicles/import',               ['as' => 'secure.dealers.new_vehicles.imported',        'uses' => 'Secure\DealerNewVehiclesController@imported']);
    Route::get('/dealers/{dealers}/new_vehicles/create/{vehicles}',     ['as' => 'secure.dealers.new_vehicles.create_from',     'uses' => 'Secure\DealerNewVehiclesController@createForm']);
    Route::resource('dealers.new_vehicles',                                                                                     'Secure\DealerNewVehiclesController');

    Route::get('/dealers/{dealers}/used_vehicles/export',               ['as' => 'secure.dealers.used_vehicles.export',         'uses' => 'Secure\DealerUsedVehiclesController@export']);
    Route::get('/dealers/{dealers}/used_vehicles/import',               ['as' => 'secure.dealers.used_vehicles.import',         'uses' => 'Secure\DealerUsedVehiclesController@import']);
    Route::post('/dealers/{dealers}/used_vehicles/import',              ['as' => 'secure.dealers.used_vehicles.imported',       'uses' => 'Secure\DealerUsedVehiclesController@imported']);
    Route::get('/dealers/{dealers}/used_vehicles/create/{vehicles}',    ['as' => 'secure.dealers.used_vehicles.create_from',    'uses' => 'Secure\DealerUsedVehiclesController@createForm']);

    Route::get('/pictures/{picture_id}',                                ['as' => 'secure.pictures.destroy',                     'uses' => 'Secure\PicturesController@destroy']);
    Route::resource('dealers.used_vehicles', 'Secure\DealerUsedVehiclesController');


    Route::get('/on-road-prices/export',                ['as' => 'secure.on-road-prices.export',          'uses' => 'Secure\OnRoadPriceController@export']);
    Route::get('/on-road-prices/import',                ['as' => 'secure.on-road-prices.import',          'uses' => 'Secure\OnRoadPriceController@import']);
    Route::post('/on-road-prices/import',               ['as' => 'secure.on-road-prices.imported',        'uses' => 'Secure\OnRoadPriceController@imported']);
    Route::get('/on-road-prices/create/{vehicles}',     ['as' => 'secure.on-road-prices.create_from',     'uses' => 'Secure\OnRoadPriceController@createForm']);
    Route::resource('on-road-prices', 'Secure\OnRoadPriceController');
});

Route::group(['prefix' => 'secure', 'middleware' => ['auth']], function() {
    Route::resource('inventories', 'Secure\InventoriesController');
});

Route::group(['prefix' => 'dealer-area', 'middleware' => ['auth']], function() {
    Route::get('/vehicles',                         ['as' => 'dealer-area.vehicles.index',          'uses' => 'Dealer\VehiclesController@index']);
    Route::get('/vehicles/{vehicles}',              ['as' => 'dealer-area.vehicles.show',           'uses' => 'Dealer\VehiclesController@show']);

    Route::get('/dealer-area/used_vehicles/create/{vehicles}',    ['as' => 'dealer-area.used_vehicles.create_form',    'uses' => 'Dealer\UsedVehiclesController@createForm']);
    Route::get('/dealer-area/used_vehicles/my-vehicles',          ['as' => 'dealer-area.used_vehicles.myVehicles',     'uses' => 'Dealer\UsedVehiclesController@myVehicles']);
    Route::resource('used_vehicles', 'Dealer\UsedVehiclesController');

    Route::get('/dealers',                          ['as' => 'dealer-area.dealers.index',           'uses' => 'Dealer\DealersController@index']);
    Route::get('/dealers/{dealers}',                ['as' => 'dealer-area.dealers.show',            'uses' => 'Dealer\DealersController@show']);

    Route::get('/on-road-prices/export',                ['as' => 'dealer-area.on-road-prices.export',          'uses' => 'Dealer\OnRoadPriceController@export']);
    Route::get('/on-road-prices',                       ['as' => 'dealer-area.on-road-prices.index',           'uses' => 'Dealer\OnRoadPriceController@index']);
});