<?php namespace App\Http\Controllers\Dealer;

use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DealerRequest;
use App\Repositories\DealerRepository;
use App\Repositories\UserRepository;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Collections\CellCollection;
use Maatwebsite\Excel\Facades\Excel;

class DealersController extends Controller {

    private $repository;
    private $userRepository;

    /**
     * @param DealerRepository $repository
     */
    function __construct(DealerRepository $repository, UserRepository $userRepository) {
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
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['status' => 'ACTIVE'], $request->all());
        $dealers = $this->repository->regexSearch($request, $size, ['state' => 'desc', 'city' => 'desc', 'location' => 'desc']);
        return view('dealer.dealers.index', compact('dealers', 'size'))->with('request', $request);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Dealer $dealer)
	{
        return view('dealer.dealers.show', compact('dealer'));
	}
}
