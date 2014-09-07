<?php namespace Fawkes\Users;

class RegisterUserCommand {
    /**
     * @var array
     */
    public $person;

    /**
     * @param array $person
     */
    public function __construct(array $person)
    {
        $this->person = $person;
    }

}