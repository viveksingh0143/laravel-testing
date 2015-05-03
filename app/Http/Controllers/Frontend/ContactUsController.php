<?php namespace App\Http\Controllers\Frontend;

use App\Dealer;
use App\Http\Controllers\Controller;
use App\Mailers\FormMailer;
use App\UsedVehicle;
use Illuminate\Http\Request;

class ContactUsController extends Controller {

    protected $mailer;

	public function __construct(FormMailer $mailer)
	{
        $this->mailer = $mailer;
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function bestDeal(Request $request)
	{
        $this->mailer->contactUsThanksMail($request->all());
        $this->mailer->contactUsQuery($request->all());
		return view('frontend.contact_us.best_deal');
	}

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getSellerDetails($id, $slug)
    {
        $usedVehicle = UsedVehicle::with('vehicle', 'dealer')->find($id);
        $dealer = $usedVehicle->dealer;
        return view('frontend.contact_us.seller_details', compact('dealer', 'usedVehicle'));
    }
}
