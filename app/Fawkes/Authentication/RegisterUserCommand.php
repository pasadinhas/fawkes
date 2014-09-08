<?php namespace Fawkes\Authentication;

class RegisterUserCommand {
    /**
     * @var array
     */
    public $person;

    /**
     * @param $person
     */
    public function __construct($person)
    {
        $this->person = $person;
    }

}