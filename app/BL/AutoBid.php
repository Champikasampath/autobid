<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/3/20
 * Time: 10:13 PM
 */

namespace App\BL;


use App\Repository\AutoBidRepository;

class AutoBid extends Core
{
    public function __construct()
    {
        parent::__construct(app(AutoBidRepository::class));
    }
}