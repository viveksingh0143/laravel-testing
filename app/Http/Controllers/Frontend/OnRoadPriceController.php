<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\OnRoadPriceRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OnRoadPriceController extends Controller {

    private $repository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(OnRoadPriceRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = $request->all();
        $on_road_prices = $this->repository->regexSearch($request, $size);
        return view('frontend.on_road_prices.index', compact('on_road_prices', 'size'))->with('request', $request);
    }
}