<?php namespace Fawkes\Authentication\Commands;

use Fawkes\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler {

    use DispatchableTrait;

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
            $command->person->email,
            $command->token->getAccessToken(),
            $command->token->getRefreshToken(),
            $command->token->getEndOfLife()
        );

        $this->dispatchEventsFor($user);

        return $user;
    }

}