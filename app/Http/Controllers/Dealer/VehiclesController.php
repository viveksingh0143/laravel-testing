<?php namespace App\Http\Controllers\Dealer;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\VehicleRequest;
use App\Repositories\BrandRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Maatwebsite\Excel\Collections\CellCollection;
use Maatwebsite\Excel\Facades\Excel;

class VehiclesController extends Controller {

    private $repository;
    private $brandRepository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(VehicleRepository $repository, BrandRepository $brandRepository) {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $brands = Brand::where('status', 'ACTIVE')->lists('name', 'name');
        $models = [];
        $variants = [];
        $bnames_selected = $request->get('bname');
        $models_selected = $request->get('model');

        if(isset($bnames_selected)) {
            $models = $this->repository->lists('model', 'model', ['bname' => $bnames_selected, 'status' => 'ACTIVE']);
        }
        if(isset($bnames_selected, $models_selected)) {
            $variants = $this->repository->lists('variant', 'variant', ['bname' => $bnames_selected, 'model' => $models_selected, 'status' => 'ACTIVE']);
        }

        $request = array_merge(['status' => 'ACTIVE'], $request->all());
        $vehicles = $this->repository->regexSearch($request, $size, ['bname' => 'asc', 'model' => 'asc', 'variant' => 'asc']);
        return view('dealer.vehicles.index', compact('vehicles', 'brands', 'models', 'variants', 'size'))->with('request', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @internal param int $id
     * @return Response
     */
	public function show(Vehicle $vehicle)
	{
        return view('dealer.vehicles.show', compact('vehicle'));
	}
}