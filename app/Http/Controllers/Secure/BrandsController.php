<?php namespace App\Http\Controllers\Secure;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BrandRequest;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class BrandsController extends Controller {

    private $repository;

    function __construct(BrandRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $delete_all_btn = $request->get('delete_all_btn');
        if(isset($delete_all_btn)) {
            $del_ids = $request->get('del_ids');
            if(isset($del_ids)) {
                $this->repository->destroy($del_ids);
            }
        }

        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $brands = $this->repository->regexSearch($request->all(), $size);
        return view('secure.brands.index', compact('brands', 'size'))->with('request', $request->all());
    }

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $brands = $this->repository->regexSearch($request->all(),$size);
        Excel::create('Car-Mazic-Brands-List', function($excel) use ($brands) {
            $excel->sheet('Brands', function($sheet) use ($brands) {
                $sheet->loadView('secure.brands.export')->with('brands', $brands);
            });
        })->export('xlsx');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('secure.brands.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return Response
     */
	public function store(BrandRequest $request)
	{
        $brand = $this->repository->create($request->all());
        $brand = $this->repository->attachLogo($brand, Input::file('logo'));
        flash()->success("Brand has been created successfully");
        return redirect(route('secure.brands.index'));
	}

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @internal param int $id
     * @return Response
     */
	public function show(Brand $brand)
	{
		return view('secure.brands.show', compact('brand'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @internal param int $id
     * @return Response
     */
	public function edit(Brand $brand)
	{
		return view('secure.brands.update', compact('brand'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Brand $brand
     * @param BrandRequest $request
     * @internal param int $id
     * @return Response
     */
	public function update(Brand $brand, BrandRequest $request)
	{
        $brand = $this->repository->update($brand, $request->all());
        $brand = $this->repository->attachLogo($brand, Input::file('logo'));
        flash()->success("Brand has been updated successfully");
        return redirect(route('secure.brands.index'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @throws \Exception
     * @internal param int $id
     * @return Response
     */
	public function destroy(Brand $brand)
	{
		$brand->delete();
        flash()->success("Brand has been destroyed successfully");
        return redirect(route('secure.brands.index'));
	}
}
