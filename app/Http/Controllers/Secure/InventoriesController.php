<?php namespace App\Http\Controllers\Secure;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\InventoryRequest;
use App\Inventory;
use App\Picture;
use App\Repositories\InventoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class InventoriesController extends Controller {

    private $repository;
    private $userRepository;

    /**
     * @param DealerRepository $repository
     */
    function __construct(InventoryRepository $repository, UserRepository $userRepository) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }


    /**
	 * Display a listing of the resource.
	 *
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
        $inventories = $this->repository->regexSearch(array_merge(['user_id' => Auth::user()->id], $request->all()), $size, ['updated_at' => 'asc']);
        return view('secure.inventories.index', compact('inventories', 'size'))->with('request', $request->all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('secure.inventories.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param InventoryRequest $request
     * @return Response
     */
	public function store(InventoryRequest $request)
	{
        $inventory = $this->repository->create(array_merge(['user_id' => Auth::user()->id], $request->all()));
        $inventory = $this->repository->attachPictures($inventory, Input::file('pictures'));
        flash()->success("Inventory has been created successfully");
        return redirect(route('secure.inventories.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Inventory $inventory)
	{
        return view('secure.inventories.show', compact('inventory'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Inventory $inventory)
	{
        return view('secure.inventories.update', compact('inventory'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Inventory $inventory, Request $request)
	{
        $inventory = $this->repository->update($inventory, $request->all());
        $inventory = $this->repository->attachPictures($inventory, Input::file('pictures'));
        flash()->success("Inventory has been update successfully");
        return redirect(route('secure.inventories.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Inventory $inventory)
	{
        $inventory->delete();
        flash()->success("Inventory has been deleted successfully");
        return redirect(route('secure.inventories.index'));
	}
}
