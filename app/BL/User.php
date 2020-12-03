<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/3/20
 * Time: 4:52 PM
 */

namespace App\BL;


class User extends Core
{
    private $users;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct('');
        $this->users = config('auction.users');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getById($id)
    {
        $found_key = array_search($id, array_column($this->users, 'id'));
        $keys = array_keys($this->users);
        return $this->users[$keys[$found_key]];
    }
}