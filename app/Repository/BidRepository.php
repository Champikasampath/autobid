<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/1/20
 * Time: 11:51 PM
 */

namespace App\Repository;

use App\Models\Bid;

class BidRepository
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
            return Bid::create($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $item_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getHighestBidByItem($item_id)
    {
        try {
            return Bid::where('item_id', $item_id)->max('bid');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $item_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getHighestBidder($item_id)
    {
        try {
            return Bid::where('item_id', $item_id)->orderBy('bid', 'desc')->first();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}