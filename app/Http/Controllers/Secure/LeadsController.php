<?php namespace App\Http\Controllers\Secure;

use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DealerRequest;
use App\Http\Requests\LeadRequest;
use App\Lead;
use App\Repositories\DealerRepository;
use App\Repositories\LeadRepository;
use App\Repositories\UserRepository;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Collections\CellCollection;
use Maatwebsite\Excel\Facades\Excel;

class LeadsController extends Controller {

    private $repository;
    private $userRepository;

    /**
     * @param LeadRepository $repository
     * @param UserRepository $userRepository
     */
    function __construct(LeadRepository $repository, UserRepository $userRepository) {
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
        $leads = $this->repository->regexSearch($request->all(), $size);
        return view('secure.leads.index', compact('leads', 'size'))->with('request', $request->all());
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $users = $this->userRepository->listDealers();
        return view('secure.leads.create', compact('users'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param LeadRequest $request
     * @return Response
     */
	public function store(LeadRequest $request)
	{
        $user = null;
        $user_id = $request->get('user_id');
        if(!empty($user_id) && $user_id != -1) {
            $user = $this->userRepository->find($user_id);
        }
        $lead = $this->repository->create($request->all(), $user);
        flash()->success("Lead has been created successfully");
        return redirect(route('secure.leads.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Lead $lead)
	{
        return view('secure.leads.show', compact('lead'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lead $lead
     * @internal param int $id
     * @return Response
     */
	public function edit(Lead $lead)
	{
        $users = $this->userRepository->listDealers();
        return view('secure.leads.update', compact('lead', 'users'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Lead $lead
     * @param LeadRequest $request
     * @internal param int $id
     * @return Response
     */
	public function update(Lead $lead, LeadRequest $request)
	{
        $data = $request->all();
        if(isset($data['user_id']) && $data['user_id'] == '-1') {
            $data['user_id'] = null;
        }
        $lead = $this->repository->update($lead, $data);
        flash()->success("Lead has been updated successfully");
        return redirect(route('secure.leads.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Lead $lead)
	{
        $lead->delete();
        flash()->success("Lead has been removed successfully");
        return redirect(route('secure.leads.index'));
	}

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $leads = $this->repository->regexSearch($request->all(), $size);
        Excel::create('Car-Mazic-Leads-List', function($excel) use ($leads) {
            $excel->sheet('Leads', function($sheet) use ($leads) {
                $sheet->loadView('secure.leads.export')->with('leads', $leads);
            });
        })->export('xlsx');
    }
}