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
            if (count($bid_config->toArray()) == 0) {
                return AutoBidConfig::create($data);
            }
            $bid_config->max_bid_amount = $data['max_bid_amount'];
            $bid_config->save();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function get($id)
    {
        return AutoBidConfig::where('user_id', $id)->first();
    }

}