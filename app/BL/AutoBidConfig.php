<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/3/20
 * Time: 10:13 PM
 */

namespace App\BL;

use App\Repository\AutoBidConfigRepository;

class AutoBidConfig extends Core
{
    /**
     * AutoBidConfig constructor.
     */
    public function __construct()
    {
        parent::__construct(app(AutoBidConfigRepository::class));
    }


    public function create($user_id, $amount)
    {
        $data = [
            'user_id' => $user_id,
            'max_bid_amount' => $amount
        ];
        return $this->repository->create($data);
    }

    public function get($user_id)
    {
        return $this->repository->get($user_id);
    }
}