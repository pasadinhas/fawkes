<?php

use Fawkes\Users\RegisterUserCommand;
use Fawkes\Users\UserRepository;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\CommandHandler;

use Illuminate\Auth\Guard as Auth;

class LoginUserCommandHandler implements CommandHandler
{
    use CommanderTrait;

    /**
     * @var Fawkes\Users\UserRepository
     */
    protected $userRepository;
    /**
     * @var Illuminate\Auth\Guard
     */
    private $auth;

    /**
     * @param UserRepository        $userRepository
     * @param Illuminate\Auth\Guard $auth
     */
    public function __construct(UserRepository $userRepository, Auth $auth)
    {
        $this->userRepository = $userRepository;
        $this->auth = $auth;
    }

    /**
     * Handle the command
     *
     * @param $command
     *
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->userRepository->findByUsername($command->person['username']);

        if (!$user)
        {
            $registerUserCommand = new RegisterUserCommand($command->person);
            $user = $this->execute($registerUserCommand);
        }

        $this->auth->login($user);
    }
}