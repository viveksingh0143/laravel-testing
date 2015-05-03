<?php namespace App\Http\Controllers\Secure;

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
        $delete_all_btn = $request->get('delete_all_btn');
        if(isset($delete_all_btn)) {
            $del_ids = $request->get('del_ids');
            if(isset($del_ids)) {
                $this->repository->destroy($del_ids);
            }
        }

        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $dealers = $this->repository->regexSearch($request->all(), $size);
        return view('secure.dealers.index', compact('dealers', 'size'))->with('request', $request->all());
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $users = $this->userRepository->listDealers();
        //$users = array_merge(['CREATE_USER' => 'Create New User'], $users);
        return view('secure.dealers.create', compact('users'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param DealerRequest $request
     * @return Response
     */
	public function store(DealerRequest $request)
	{
//        dd($request->get('user_id'));
        $user_id = $request->get('user_id');
        if(empty($user_id)) {
            $user = $this->userRepository->createDealer($request->all(), false);
        } else {
            $user = $this->userRepository->find($user_id);
        }
        $dealer = $this->repository->create($request->all(), $user);
        $dealer = $this->repository->attachLogo($dealer, Input::file('logo'));
        $dealer = $this->repository->attachAdImage($dealer, Input::file('ad_image'));
        $dealer = $this->repository->attachPictures($dealer, Input::file('pictures'));
        flash()->success("Dealer has been created successfully");
        return redirect(route('secure.dealers.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Dealer $dealer)
	{
        return view('secure.dealers.show', compact('dealer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Dealer $dealer)
	{
        $users = $this->userRepository->listDealers();
        return view('secure.dealers.update', compact('dealer', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Dealer $dealer, DealerRequest $request)
	{
        $dealer = $this->repository->update($dealer, $request->all());
        $dealer = $this->repository->attachLogo($dealer, Input::file('logo'));
        $dealer = $this->repository->attachAdImage($dealer, Input::file('ad_image'));
        $dealer = $this->repository->attachPictures($dealer, Input::file('pictures'));
        flash()->success("Dealer has been updated successfully");
        return redirect(route('secure.dealers.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Dealer $dealer)
	{
        $dealer->delete();
        flash()->success("Dealer has been removed successfully");
        return redirect(route('secure.dealers.index'));
	}

    /**
     * export a listing of the resource.
     *
     * @return Response
     */
    public function export(Request $request)
    {
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $dealers = $this->repository->regexSearch($request->all(), $size);
        Excel::create('Car-Mazic-Dealers-List', function($excel) use ($dealers) {
            $excel->sheet('Dealers', function($sheet) use ($dealers) {
                $sheet->loadView('secure.dealers.export')->with('dealers', $dealers);
            });
        })->export('xlsx');
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function import()
    {
        return view('secure.dealers.import');
    }

    /**
     * import a listing of the resource from EXCEL.
     *
     * @return Response
     */
    public function imported(Request $request)
    {
        $success_count = 0;
        $failed_count = 0;
        $error_messages = array();

        $excel_files = Input::file('excel_file');
        if(!is_array($excel_files)) {
            $excel_files = array($excel_files);
        }
        foreach($excel_files as $excel_file) {
            if (isset($excel_file) && $excel_file->isValid()) {
                File::delete(storage_path('uploads/import/'. $excel_file->getClientOriginalName()));
                if(!File::exists(storage_path('uploads/import'))) {
                    File::makeDirectory(storage_path('uploads/import'), 0775, true);
                }
                File::copy($excel_file, storage_path('uploads/import/'. $excel_file->getClientOriginalName()));
                Excel::load($excel_file->getRealPath(), function($reader) use(&$success_count, &$failed_count, &$error_messages) {
					$results = $reader->get();
					foreach ($results as $row) {
                        if(get_class($row) == CellCollection::class) {
                            $return_result  = $this->saveDealer($row, null);
                            if(isset($return_result) && !empty($return_result) ) {
                                $error_messages[] = $return_result;
                                $failed_count++;
                            } else {
                                $success_count++;
                            }
                        } else {
                            foreach ($row as $col) {
                                $return_result  = $this->saveDealer($col, null);
                                if(isset($return_result) && !empty($return_result) ) {
                                    $error_messages[] = $return_result;
                                    $failed_count++;
                                } else {
                                    $success_count++;
                                }
                            }
                        }
                    }
				});
                $messages[] = "<div>Total records successfully imported: <strong>$success_count</strong></div>";
                if($failed_count > 0) {
                    $messages[] = "<div>Total records failed to imported: <strong>$failed_count<strong></div>";
                    $messages[] = "<div><strong>Error Messages: </strong></div>";
                    $messages[] = '<ul><li>' . implode("</li><li>", array_unique($error_messages)) . '</li></ul>';
                }
                if($failed_count > 0) {
                    flash()->error(implode("", $messages));
                } else {
                    flash()->success(implode("", $messages));
                }
            } else {
                flash()->error("Please select correct excel file for uploading");
            }
        }
        return redirect(route('secure.dealers.index'));
    }

    private function saveDealer($record){
		$result_return = null;
		if(isset($record->name)) {
			$data = [
				'slug'              => empty($record->slug)? str_slug($record->name) : $record->slug,
				'email'             => $record->e_mail,
				'name'              => ucwords(strtolower($record->name)),
				'contact_person'    => ucwords(strtolower($record->contact_person)),
				'about_us'          => $record->about_us,
				'state'             => ucwords(strtolower($record->state)),
				'city'              => ucwords(strtolower($record->city)),
				'location'          => ucwords(strtolower($record->location)),
				'address'           => $record->address,
				'pincode'           => $record->pincode,
				'website'           => $record->website,
				'mobile_number'     => $record->mobile_number,
				'office_number'     => $record->office_number,
				'status'            => empty($record->status)? 'ACTIVE' : strtoupper($record->status),
			];

			$dealer_id = $record->id;
			$validator_rules = [];
			$user_e_mail = $record->get('user_e_mail');
			if(empty($user_e_mail)) {
				$validator_rules['email'] = 'required|email|unique:users,email|unique:dealers,email,'.$dealer_id;
			} else {
				$validator_rules['email'] = 'required|email|unique:dealers,email,'.$dealer_id;
			}
			$validator_rules = array_merge($validator_rules, [
				'slug'                  => 'required|unique:dealers,slug,'.$dealer_id,
				'name'                  => 'required|min:6',
				'contact_person'        => 'required|min:3',
				'state'                 => 'sometimes|min:4',
				'city'                  => 'sometimes|min:4',
				'location'              => 'sometimes|min:4',
				'website'               => 'sometimes|url',
			]);
			$validator = Validator::make($data,$validator_rules);
			if (!$validator->fails()) {
				if (!empty($record->id)) {
					$dealer = $this->repository->find($record->id);
				}
				if (isset($dealer)) {
					$dealer = $this->repository->update($dealer, $data);
				} else {
					$user = $this->userRepository->createDealer($data, false);
					$dealer = $this->repository->create($data, $user);
				}
				$result_return = "";
			} else {
                $result_return = 'Having problem with name (' . $record->name . ')'. ' and e-mail (' . $record->e_mail . ')'. '<ul>' . implode('', $validator->messages()->all('<li>:message</li>')) . '</ul>';
            }
	}
        return $result_return;
    }
}