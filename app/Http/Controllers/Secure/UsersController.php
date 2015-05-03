<?php namespace App\Http\Controllers\Secure;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\DealerRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller {

    private $repository;
    private $dealerRepository;

    function __construct(UserRepository $repository, DealerRepository $dealerRepository) {
        $this->repository = $repository;
        $this->dealerRepository = $dealerRepository;
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
        $users = $this->repository->regexSearch($request->all(),$size);
        return view('secure.users.index', compact('size', 'users'))->with('request', $request->all());
    }

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $users = $this->repository->regexSearch($request->all(),$size);
        Excel::create('Car-Mazic-Users-List', function($excel) use ($users) {
            $excel->sheet('Users', function($sheet) use ($users) {
                $sheet->loadView('secure.users.export')->with('users', $users);
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
        return view('secure.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = $this->repository->createUser($inputs, false);
        flash()->success("User and dealer has been created successfully");
        return redirect(route('secure.users.index'));
	}

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @internal param int $id
     * @return Response
     */
	public function show(User $user)
	{
        return view('secure.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
        return view('secure.users.update', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request, User $user)
	{
        $inputs = $request->all();
        if(empty($inputs['password'])) {
            $inputs = array_except($inputs, ['password']);
        } else {
            $inputs['password'] = bcrypt($inputs['password']);
        }
        $user = $this->repository->update($user, $inputs);
        flash()->success("User has been updated successfully");
        return redirect(route('secure.users.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
        $user->delete();
        flash()->success("Selected user has been deleted successfully");
        return redirect(route('secure.users.index'));
	}

    /**
     * Show the profile form for editing the specified resource.
     *
     * @return Response
     */
    public function profile(Guard $auth)
    {
        $user = $auth->user();
        if($user->role == 'DEALER') {
            $dealers = Auth::user()->dealers;
            if (isset($dealers) && count($dealers) > 0) {
                $dealer = $dealers[0];
            }
        }
        return view('secure.users.profile', compact('user', 'dealer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateProfile(UserProfileRequest $request, Guard $auth)
    {
        $user = $auth->user();
        $inputs = $request->all();
        if(empty($inputs['password'])) {
            $inputs = array_except($inputs, ['password', 'password_confirmation']);
        } else {
            $inputs['password'] = bcrypt($inputs['password']);
        }
        $this->repository->update($user, $inputs);
        flash()->success("User has been updated successfully");
        if($user->role == 'DEALER') {
            $dealers = $user->dealers;
            if (isset($dealers) && count($dealers) > 0) {
                $dealer = $dealers[0];
                $inputs = array_except($inputs, ['password', 'password_confirmation']);
                $this->dealerRepository->update($dealer, $inputs);
                $dealer = $this->dealerRepository->attachLogo($dealer, Input::file('logo'));
                $dealer = $this->dealerRepository->attachAdImage($dealer, Input::file('ad_image'));
                $dealer = $this->dealerRepository->attachPictures($dealer, Input::file('pictures'));
                flash()->success("Dealer has been updated successfully");
            }
        }
        return redirect(route('dashboard.users.profile'));
    }
}
