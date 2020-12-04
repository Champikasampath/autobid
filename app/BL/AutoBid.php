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

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function delete($data)
    {
        return $this->repository->delete($data);
    }

    /**
     * @param $user_id
     * @param $item_id
     *
     * @return mixed
     */
    public function get($user_id, $item_id)
    {
        return $this->repository->get($user_id, $item_id);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUsersByItemId($id, $highest_bidder)
    {
        return $this->repository->getUsersByItemId($id, $highest_bidder);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getNumberOfAutoBidItemsByUser($id)
    {
        return $this->repository->getNumberOfAutoBidItemsByUser($id);
    }


    /**
     * @param $item_id
     * @param $auto_bidding_user_id
     * @param $current_bid
     * @param int $increment
     *
     * @return mixed
     */
    public function placeAutoBid($item_id, $auto_bidding_user_id, $current_bid, $increment = 1)
    {
        $has_credit = AutoBidConfig::init()->hasAutoBidCredit($auto_bidding_user_id);
        if($has_credit) {
            $data = array(
                'item_id' => $item_id,
                'bidder_id' => $auto_bidding_user_id,
                'bid' => $current_bid + $increment,
            );
            AutoBidConfig::init()->updateUsedCredit($auto_bidding_user_id, $increment);
            Bid::init()->placeBid($data);
        }

    }

}