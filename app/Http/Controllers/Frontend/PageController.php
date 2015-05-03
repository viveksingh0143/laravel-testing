<?php namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Page;
use App\Repositories\BrandRepository;
use App\Repositories\UsedVehicleRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;

class PageController extends Controller {

    /**
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $size   = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $pages  = Page::where('status', 'ACTIVE')->paginate($size);
		return view('frontend.pages.list', compact('pages'))->with('request', $request->all());
	}

    /**
     *
     * @return Response
     */
    public function show($slug)
    {
        $page  = Page::where('status', 'ACTIVE')->where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show', compact('page'));
    }
}
