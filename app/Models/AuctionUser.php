<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/3/20
 * Time: 12:30 AM
 */

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;

class AuctionUser implements Authenticatable
{
    public function getAuthIdentifier() {

    }
    public function getAuthPassword() {

    }

    public function getRememberToken() {

    }

    public function setRememberToken($value) {

    }
    public function getRememberTokenName() {

    }
}