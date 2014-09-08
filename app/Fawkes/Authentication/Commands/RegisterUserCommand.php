<?php namespace Fawkes\Authentication\Commands;

use OAuth\OAuth2\Token\TokenInterface;

class RegisterUserCommand {

    public $person;
    public $token;

    /**
     * @param $person
     * @param $token
     */
    public function __construct($person, TokenInterface $token)
    {
        $this->person = $person;
        $this->token = $token;
    }

}