<?php namespace Fawkes\Authentication\Commands;

use Fawkes\Authentication\RegisterUserCommand;
use Fawkes\Users\UserRepository;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\CommandHandler;

use Fenix;

use Illuminate\Auth\AuthManager as Auth;

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
     * @param UserRepository               $userRepository
     * @param \Illuminate\Auth\AuthManager $auth
     */
    public function __construct(UserRepository $userRepository, Auth $auth)
    {
        $this->userRepository = $userRepository;
        $this->auth = $auth->driver();
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
        $token = Fenix::requestAccessToken($command->code);

        $person = Fenix::getPerson();

        $user = $this->userRepository->findByUsername($person->username);

        if (!$user)
        {
            $user = $this->execute(RegisterUserCommand::class, compact('person', 'token'));
        }
        else
        {
            $this->userRepository->updateUserToken($user, $token);
        }

        $this->auth->login($user);
    }
}