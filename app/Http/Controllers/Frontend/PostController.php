<?php namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Page;
use App\Post;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;

class PostController extends Controller {

    /**
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $size   = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $posts  = Post::where('status', 'ACTIVE')->paginate($size);
		return view('frontend.posts.list', compact('posts'))->with('request', $request->all());
	}

    /**
     *
     * @return Response
     */
    public function show($slug)
    {
        $post  = Post::where('status', 'ACTIVE')->where('slug', $slug)->firstOrFail();
        return view('frontend.posts.show', compact('post'));
    }
}