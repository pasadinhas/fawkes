<?php namespace Fawkes\Users;

class LoginUserCommand {

    public $person;

    public function __construct($person)
    {
        $this->person = $person;
    }
}