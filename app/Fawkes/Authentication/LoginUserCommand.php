<?php namespace Fawkes\Authentication;

use OAuth\OAuth2\Token\TokenInterface;

class LoginUserCommand {
    /**
     * @var
     */
    public $person;

    /**
     * @var \OAuth\OAuth2\Token\TokenInterface
     */
    public $token;

    /**
     * @param                $person
     * @param TokenInterface $token
     */
    public function __construct($person, TokenInterface $token)
    {
        $this->person = $person;
        $this->token = $token;
    }
}