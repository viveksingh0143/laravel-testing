<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

trait AuthenticatesAndRegistersUsers {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * The userRepository implementation.
	 *
	 * @var UserRepository
	 */
	protected $userRepository;

	/**
	 * The dealerRepository implementation.
	 *
	 * @var DealerRepository
	 */
	protected $dealerRepository;

    /**
     * Handle user email confirmation by confirmation code.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConfirm($user_id, $confirmation_code)
    {
        $user = $this->userRepository->confirmUserAccount($user_id, $confirmation_code);
        return view('auth.confirm', compact('user'));
    }

    /**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$validator = $this->userRepository->userValidator($request->all());
		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
        $user = $this->userRepository->createUser($request->all());
        $this->mailer->emailConfirmation($user);
        return view('auth.thank_you_registration', compact('user'));
	}

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDealerRegister()
    {
        return view('auth.dealer_register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDealerRegister(Request $request)
    {
        $validator = $this->userRepository->dealerValidator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->userRepository->createDealer($request->all());
		$dealer_data = [
			'slug' => str_slug($request['company_name']),
			'name' => $request['company_name'],
		];
		$this->dealerRepository->create(array_merge($dealer_data, $request->all()), $user);
        return view('auth.thank_you_registration', compact('user'));
    }

    /**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgentLogin()
    {
        return view('auth.agent_login');
    }

    /**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');
        $credentials['confirmed'] = true;
        $credentials['status'] = 'ACTIVE';

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard/home';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}

}
