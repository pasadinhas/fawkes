<?php namespace Fawkes\Authentication\Commands;

class LoginUserCommand {

    public $code;

    /**
     * @param $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }
}