<?php

use Fawkes\Authentication\Commands\LoginUserCommand;
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
        $fenix = OAuth::make('FenixEdu', null, null, 'Fawkes\OAuth\FenixEduCacheDecorator');
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
        $session = OAuth::makeStorage();
        $session->clearToken('FenixEdu');
        $session->clearAuthorizationState('FenixEdu');

        Auth::logout();

        return Redirect::route('home');
    }

}