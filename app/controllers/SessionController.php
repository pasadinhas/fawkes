<?php

use Fawkes\Users\LoginUserCommand;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommanderTrait;

class SessionController extends \BaseController {

    use CommanderTrait;

	/**
	 * Login a user.
	 *
	 * @return Response
	 */
	public function store()
	{
        $fenix = OAuth::consumer('FenixEdu');
        $code = Input::get('code');

        if (empty($code))
        {
            return Redirect::to(login_url());
        }

        $fenix->requestAccessToken($code);

        $person = $fenix->getPerson();

        $command = new LoginUserCommand($person);
        $user = $this->execute($command);

        return Redirect::intended('/');
	}

}