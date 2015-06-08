<?php namespace App\Http\Controllers\Secure;

use App\AppKey;
use App\Dealer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AppKeyRequest;
use App\Repositories\AppKeyRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AppKeysController extends Controller {

    private $repository;

    /**
     * @param VehicleRepository $repository
     */
    function __construct(AppKeyRepository $repository) {
        $this->repository = $repository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, Dealer $dealer)
	{
        $delete_all_btn = $request->get('delete_all_btn');
        if(isset($delete_all_btn)) {
            $del_ids = $request->get('del_ids');
            if(isset($del_ids)) {
                $this->repository->destroy($del_ids);
            }
        }
        $size = $request->get('size', getenv('DEFAULT_LIST_SIZE'));
        $request = array_merge(['dealer_id' => $dealer->id], $request->all());
        $app_keys = $this->repository->regexSearch($request, $size);
        return view('secure.app_keys.index', compact('dealer', 'app_keys', 'size'))->with('request', $request);
    }

    public function create(Request $request, Dealer $dealer)
	{
        $random_str = null;
        while($random_str == null) {
            $random_str = Str::upper(Str::random());
            $count = AppKey::where('key', $random_str)->count();
            if($count > 0) {
                $random_str = null;
            }
        }
        $dealer->appKeys()->create(['key' => $random_str]);
        flash()->success("Application key has been generated successfully");
        return redirect(route('secure.dealers.app_keys.index', $dealer->id));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Dealer $dealer
     * @param  int $id
     * @return Response
     */
	public function destroy(Dealer $dealer, AppKey $app_key)
	{
        $app_key->delete();
        flash()->success("Application key has been deleted successfully");
        return redirect(route('secure.dealers.app_keys.index', $dealer->id));
	}
}
