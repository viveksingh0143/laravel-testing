<?php namespace App\Http\Controllers\Frontend;

use App\Dealer;
use App\Http\Controllers\Controller;
use App\Mailers\FormMailer;
use App\Repositories\LeadRepository;
use App\Repositories\UserRepository;
use App\UsedVehicle;
use Illuminate\Http\Request;

class ContactUsController extends Controller {

    protected $mailer;
    private $repository;
    private $userRepository;

    /**
     * @param FormMailer $mailer
     * @param LeadRepository $repository
     * @param UserRepository $userRepository
     */
    public function __construct(FormMailer $mailer, LeadRepository $repository, UserRepository $userRepository)
	{
        $this->mailer = $mailer;
        $this->repository = $repository;
        $this->userRepository = $userRepository;
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function bestDeal(Request $request)
	{
        $data = [
            'type' => $request->get('type'),
            'subject' => $request->get('subject'),
            'user_id' => $request->get('user_id'),
        ];
        if(!empty($data['type'])) {
            $all_data = $request->all();
            unset($all_data['type'], $all_data['subject'], $all_data['user_id'], $all_data['_token']);
            $requested_params = [];
            foreach($all_data as $key => $value) {
                $requested_params[] = "$key => $value";
            }
            $data['body'] = implode('<br />', $requested_params);
            $user = null;
            $user_id = $data['user_id'];
            if(!empty($user_id) && $user_id != -1) {
                $user = $this->userRepository->find($user_id);
            }
            $lead = $this->repository->create($data, $user);
        }
        $this->mailer->contactUsThanksMail($request->all());
        $this->mailer->contactUsQuery($request->all());
		return view('frontend.contact_us.best_deal');
	}

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function bestInsuranceDeal() {
        return view('frontend.contact_us.insurance_best_deal');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function processBestInsuranceDeal(Request $request)
    {
        $data = [
            'type' => $request->get('type'),
            'subject' => $request->get('subject'),
            'user_id' => $request->get('user_id'),
        ];
        if(!empty($data['type'])) {
            $all_data = $request->all();
            unset($all_data['type'], $all_data['subject'], $all_data['user_id'], $all_data['_token']);
            $requested_params = [];
            foreach($all_data as $key => $value) {
                $requested_params[] = "$key => $value";
            }
            $data['body'] = implode('<br />', $requested_params);
            $user = null;
            $user_id = $data['user_id'];
            if(!empty($user_id) && $user_id != -1) {
                $user = $this->userRepository->find($user_id);
            }
            $lead = $this->repository->create($data, $user);
        }
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
