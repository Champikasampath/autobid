<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/1/20
 * Time: 11:51 PM
 */

namespace App\Repository;

use App\Models\AutoBidConfig;

class AutoBidConfigRepository
{
    /**
     * @param $data
     *
     * @return mixed
     * @throws \Exception
     */
    public function create($data)
    {
        try {
            $bid_config = AutoBidConfig::where('user_id', $data['user_id'])->first();

            if (empty($bid_config)) {
                return AutoBidConfig::create($data);
            }
            $bid_config->max_bid_amount = $data['max_bid_amount'];
            $bid_config->save();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return AutoBidConfig::where('user_id', $id)->first();
    }

    /**
     * @param $user_id
     * @param $amount
     */
    public function updateUsedCredit($user_id, $amount)
    {
        $config =  AutoBidConfig::where('user_id', $user_id)->first();
        $config->used_credit = $config->used_credit + $amount;
        $config->save();
    }

    /**
     * @param $user_id
     *
     * @return bool
     */
    public function hasAutoBidCredit($user_id)
    {
        $bid_config = AutoBidConfig::where('user_id', $user_id)->first();
        return $bid_config['max_bid_amount'] > $bid_config['used_credit'];
    }

}