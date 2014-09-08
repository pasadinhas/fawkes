<?php namespace Fawkes\Authentication;

use Fawkes\Users\UserRepository;
use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler {
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $user = $this->userRepository->registerUser(
            $command->person->name,
            $command->person->username,
            $command->person->email
        );

        return $user;
    }

}