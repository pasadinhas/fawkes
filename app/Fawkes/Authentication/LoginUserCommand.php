<?php namespace Fawkes\Authentication;

class LoginUserCommand {

    public $person;

    public function __construct($person)
    {
        $this->person = $person;
    }
}