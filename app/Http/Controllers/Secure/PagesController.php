<?php namespace App\Http\Controllers\Secure;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PageRequest;
use App\Page;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller {

    private $repository;

    function __construct(PageRepository $repository) {
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
        $pages = $this->repository->regexSearch($request->all(), $size);
        return view('secure.pages.index', compact('pages', 'size'))->with('request', $request->all());
	}

	/**
	 * export a listing of the resource.
	 *
	 * @return Response
	 */
	public function export(Request $request)
	{
		$size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
		$pages = $this->repository->regexSearch($request->all(),$size);
		Excel::create('Car-Mazic-Pages-List', function($excel) use ($pages) {
			$excel->sheet('Pages', function($sheet) use ($pages) {
				$sheet->loadView('secure.pages.export')->with('pages', $pages);
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
		return view('secure.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PageRequest $request
	 * @return Response
	 */
	public function store(PageRequest $request)
	{
        $page = $this->repository->create($request->all());
        $page = $this->repository->attachThumbnail($page, Input::file('thumbnail'));
        flash()->success("Page has been created successfully");
		return redirect(route('secure.pages.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Page $page
	 * @internal param int $id
	 * @return Response
	 */
	public function show(Page $page)
	{
		return view('secure.pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Page $page
	 * @internal param int $id
	 * @return Response
	 */
	public function edit(Page $page)
	{
		return view('secure.pages.update', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Page $page
	 * @param PageRequest $request
	 * @internal param int $id
	 * @return Response
	 */
	public function update(Page $page, PageRequest $request)
	{
        $page = $this->repository->update($page, $request->all());
        $page = $this->repository->attachThumbnail($page, Input::file('thumbnail'));
        flash()->success("Page has been updated successfully");
		return redirect(route('secure.pages.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Page $page
	 * @throws \Exception
	 * @internal param int $id
	 * @return Response
	 */
	public function destroy(Page $page)
	{
		$page->delete();
        flash()->success("Page has been destroyed successfully");
		return redirect(route('secure.pages.index'));
	}
}
