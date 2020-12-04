<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/1/20
 * Time: 11:51 PM
 */

namespace App\Repository;

use App\Models\AutoBid;
use App\Models\Bid;

class AutoBidRepository
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
            return AutoBid::create($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $data
     *
     * @return mixed
     * @throws \Exception
     */
    public function delete($data)
    {
        try {
            return AutoBid::where('item_id', $data['item_id'])->where('user_id', $data['user_id'])->delete();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $user_id
     * @param $item_id
     *
     * @return mixed
     */
    public function get($user_id, $item_id)
    {
        return AutoBid::where('item_id', $item_id)->where('user_id', $user_id)->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUsersByItemId($item_id, $user_id)
    {
        return AutoBid::with('config')
                      ->join('auto_bidding_configs', 'auto_bidding_configs.user_id', '=', 'auto_biddings.user_id')
                      ->where('auto_biddings.item_id', $item_id)
                      ->whereNotIn('auto_biddings.user_id', [$user_id])
                      ->orderByRaw('(auto_bidding_configs.max_bid_amount - auto_bidding_configs.used_credit) ASC')
                      ->get();
    }

    public function getNumberOfAutoBidItemsByUser($id)
    {
        return AutoBid::where('user_id', $id)
                      ->count('item_id');
    }
}