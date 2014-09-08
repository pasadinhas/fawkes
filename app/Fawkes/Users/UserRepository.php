<?php namespace Fawkes\Users;

use OAuth\OAuth2\Token\TokenInterface;

class UserRepository
{
    /**
     * @var \User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $username
     *
     * @return null
     */
    public function findByUsername($username)
    {
        return $this->user->where('username', $username)->first() ?: null;
    }

    /**
     * @param $name
     * @param $username
     * @param $email
     *
     * @return static
     */
    public function registerUser($name, $username, $email, $access_token, $refresh_token, $end_of_life)
    {
        $user = User::register($name, $username, $email, $access_token, $refresh_token, $end_of_life);

        $user->save();

        return $user;
    }

    /**
     * @param User           $user
     * @param TokenInterface $token
     *
     * @return User
     */
    public function updateUserToken(User $user, TokenInterface $token)
    {
        $user->access_token = $token->getAccessToken();
        $user->refresh_token = $token->getRefreshToken();
        $user->token_end_of_life = $token->getEndOfLife();

        $user->save();

        return $user;
    }
}
