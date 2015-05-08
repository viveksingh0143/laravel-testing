<?php namespace App\Providers;

use App\Repositories\BrandRepository;
use App\Repositories\DealerRepository;
use App\Repositories\Eloquent\EloquentBrandRepository;
use App\Repositories\Eloquent\EloquentDealerRepository;
use App\Repositories\Eloquent\EloquentInventoryRepository;
use App\Repositories\Eloquent\EloquentLeadRepository;
use App\Repositories\Eloquent\EloquentNewVehicleRepository;
use App\Repositories\Eloquent\EloquentOnRoadPriceRepository;
use App\Repositories\Eloquent\EloquentPageRepository;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Eloquent\EloquentUsedVehicleRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\Eloquent\EloquentVehicleRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\NewVehicleRepository;
use App\Repositories\OnRoadPriceRepository;
use App\Repositories\PageRepository;
use App\Repositories\PostRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\LeadRepository;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
        $this->app->bind(PageRepository::class, EloquentPageRepository::class);
        $this->app->bind(BrandRepository::class, EloquentBrandRepository::class);
        $this->app->bind(VehicleRepository::class, EloquentVehicleRepository::class);
        $this->app->bind(DealerRepository::class, EloquentDealerRepository::class);
        $this->app->bind(NewVehicleRepository::class, EloquentNewVehicleRepository::class);
        $this->app->bind(UsedVehicleRepository::class, EloquentUsedVehicleRepository::class);
        $this->app->bind(OnRoadPriceRepository::class, EloquentOnRoadPriceRepository::class);
        $this->app->bind(InventoryRepository::class, EloquentInventoryRepository::class);
        $this->app->bind(LeadRepository::class, EloquentLeadRepository::class);
	}
}