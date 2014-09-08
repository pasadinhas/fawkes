<?php

use Fawkes\Authentication\LoginUserCommand;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommanderTrait;
use OAuth\Common\Storage\Session;

class SessionController extends \BaseController {

    use CommanderTrait;

	/**
	 * Login a user.
	 *
	 * @return Response
	 */
	public function store()
	{
        OAuth::setHttpClient('CurlClient');
        $fenix = OAuth::consumer('FenixEdu');
        $code = Input::get('code');

        if (empty($code))
        {
            return Redirect::to(login_url());
        }

        $token = $fenix->requestAccessToken($code);
        $person = $fenix->getPerson();

        $this->execute(LoginUserCommand::class, compact('person', 'token'));

        return Redirect::intended('/');
	}

    /**
     * Logout a user.
     *
     * @return Response
     */
    public function destroy()
    {

        // FIXME: extract to command

        $session = new Session();
        $session->clearToken('FenixEdu');
        $session->clearAuthorizationState('FenixEdu');
        Auth::logout();
        return Redirect::route('home');
    }

}