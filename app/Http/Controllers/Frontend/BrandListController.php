<?php namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;

class BrandListController extends Controller {
	/**
	 *
	 * @return Response
	 */
	public function index()
	{
        $all_brands         = Brand::where('status', 'ACTIVE')->get();
		return view('frontend.brand_list', compact('all_brands'));
	}
}
