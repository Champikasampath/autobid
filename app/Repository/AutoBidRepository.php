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

}