<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/2/20
 * Time: 11:47 PM
 */

namespace App\Auth;


use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class CustomUserProvider implements UserProvider
{
    private $userArr = [];

    /**
     * CustomUserProvider constructor.
     */
    public function __construct()
    {
        $this->userArr = config('auction.users');
    }

    /**
     * @param mixed $identifier
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|mixed|null
     */
    public function retrieveById($identifier) {
        $found_key = array_search($identifier, array_column($this->userArr, 'id'));
        $user = new User;
        $user->id = $this->userArr[$found_key]['id'];
        $user->name = $this->userArr[$found_key]['username'];
    }

    /**
     * @param mixed $identifier
     * @param string $token
     *
     * @return Authenticatable|null
     */
    public function retrieveByToken($identifier, $token) {
        return null;
    }

    /**
     * @param Authenticatable $user
     * @param string $token
     *
     * @return null|void
     */
    public function updateRememberToken(Authenticatable $user, $token) {
        return null;
    }

    public function retrieveByCredentials(array $credentials) {
        $found_key = array_search($credentials['username'], array_column($this->userArr, 'username'));
        $user = $this->userArr[0];
        if($user['password'] == $credentials['password']) {

        }
    }

    /**
     * @param Authenticatable $user
     * @param array $credentials
     *
     * @return bool|null
     */
    public function validateCredentials(Authenticatable $user, array $credentials) {
        return null;
    }
}