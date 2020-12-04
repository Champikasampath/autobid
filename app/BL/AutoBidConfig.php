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
            'max_bid_amount' => $amount,
        ];
        return $this->repository->create($data);
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function get($user_id)
    {
        return $this->repository->get($user_id);
    }

    /**
     * @param $user_id
     * @param $amount
     *
     * @return mixed
     */
    public function updateUsedCredit($user_id, $amount)
    {
        return $this->repository->updateUsedCredit($user_id, $amount);
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function hasAutoBidCredit($user_id) {
        return $this->repository->hasAutoBidCredit($user_id);
    }
}