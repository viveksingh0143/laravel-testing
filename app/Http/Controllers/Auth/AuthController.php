<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mailers\UserMailer;
use App\Repositories\DealerRepository;
use App\Repositories\UserRepository;
use App\Support\Mailer;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

    use AuthenticatesAndRegistersUsers;

    protected $redirectPath = '/';
    protected $mailer;

    /**
     * Create a new authentication controller instance.
     *
     * @param Guard $auth
     * @param UserRepository $userRepository
     * @return \App\Http\Controllers\Auth\AuthController
     */
    public function __construct(Guard $auth, UserRepository $userRepository, DealerRepository $dealerRepository, UserMailer $mailer)
	{
		$this->auth = $auth;
		$this->userRepository = $userRepository;
		$this->dealerRepository = $dealerRepository;
        $this->mailer = $mailer;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
