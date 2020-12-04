<?php

namespace App\Observers;

use App\BL\AutoBid;
use App\BL\AutoBidConfig;
use App\BL\Bid;
class BidObserver
{
    /**
     * Handle the Bid "created" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function created(\App\Models\Bid $bid)
    {
        $last_high_bidder = Bid::init()->getHighestBidder($bid->item_id);
        $opted_users = AutoBid::init()->getUsersByItemId($bid->item_id, $last_high_bidder->bidder_id);
        $user_with_lowest_max_bid = $opted_users[0]; //selected in asc order
        AutoBid::init()->placeAutoBid($bid->item_id, $user_with_lowest_max_bid->user_id, $bid['bid']);
    }

    /**
     * Handle the Bid "updated" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function updated(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "deleted" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function deleted(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "restored" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function restored(Bid $bid)
    {
        //
    }

    /**
     * Handle the Bid "force deleted" event.
     *
     * @param  \App\Models\Bid  $bid
     * @return void
     */
    public function forceDeleted(Bid $bid)
    {
        //
    }
}
