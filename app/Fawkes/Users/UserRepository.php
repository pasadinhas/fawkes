<?php namespace Fawkes\Users;

class UserRepository
{
    /**
     * @var \User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByUsername($username)
    {
        return $this->user->where('username', $username)->first() ?: null;
    }

    public function registerUser($name, $istId, $email)
    {
        $user = User::register($name, $istId, $email);

        User::save($user);

        return $user;
    }
}
