<?php namespace Fawkes\Authentication\Commands;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoginUserCommandValidator
{
    /**
     * @param $command
     */
    public function validate($command)
    {
        $user = $command->user;
        // validate fenix API response
    }
}