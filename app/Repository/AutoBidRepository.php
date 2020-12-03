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

}