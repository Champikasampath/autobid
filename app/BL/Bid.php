<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/1/20
 * Time: 11:38 PM
 */

namespace App\BL;

use App\Repository\BidRepository;

class Bid extends Core
{
    /**
     * Bid constructor.
     */
    public function __construct()
    {
        parent::__construct(app(BidRepository::class));
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function placeBid($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $item_id
     *
     * @return mixed
     */
    public function getHighestBidByItem($item_id)
    {
        return $this->repository->getHighestBidByItem($item_id);
    }

}