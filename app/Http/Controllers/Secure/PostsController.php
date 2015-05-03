<?php namespace App\Http\Controllers\Secure;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class PostsController extends Controller {

    private $repository;

    function __construct(PostRepository $repository) {
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
		$posts = $this->repository->regexSearch($request->all(), $size);
		return view('secure.posts.index', compact('posts', 'size'))->with('request', $request->all());
	}

	/**
	 * export a listing of the resource.
	 *
	 * @return Response
	 */
	public function export(Request $request)
	{
		$size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
		$posts = $this->repository->regexSearch($request->all(),$size);
		Excel::create('Car-Mazic-Posts-List', function($excel) use ($posts) {
			$excel->sheet('Posts', function($sheet) use ($posts) {
				$sheet->loadView('secure.posts.export')->with('posts', $posts);
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
		return view('secure.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PostRequest $request
	 * @return Response
	 */
	public function store(PostRequest $request)
	{
		$post = $this->repository->create($request->all());
        $post = $this->repository->attachThumbnail($post, Input::file('thumbnail'));
        flash()->success("Post has been created successfully");
		return redirect(route('secure.posts.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Post $post
	 * @internal param int $id
	 * @return Response
	 */
	public function show(Post $post)
	{
		return view('secure.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Post $post
	 * @internal param int $id
	 * @return Response
	 */
	public function edit(Post $post)
	{
		return view('secure.posts.update', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Post $post
	 * @param PostRequest $request
	 * @internal param int $id
	 * @return Response
	 */
	public function update(Post $post, PostRequest $request)
	{
        $post = $this->repository->update($post, $request->all());
        $post = $this->repository->attachThumbnail($post, Input::file('thumbnail'));
        flash()->success("Post has been updated successfully");
		return redirect(route('secure.posts.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Post $post
	 * @throws \Exception
	 * @internal param int $id
	 * @return Response
	 */
	public function destroy(Post $post)
	{
		$post->delete();
        flash()->success("Post has been destroyed successfully");
		return redirect(route('secure.posts.index'));
	}
}
