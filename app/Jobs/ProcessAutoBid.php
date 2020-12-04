<?php

namespace App\Jobs;

use App\BL\AutoBid;
use App\BL\Bid;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAutoBid implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $bid;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bid)
    {
        $this->bid = $bid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $last_high_bidder = Bid::init()->getHighestBidder($this->bid->item_id);
        $opted_users = AutoBid::init()->getUsersByItemId($this->bid->item_id, $last_high_bidder->bidder_id);
        $user_with_lowest_max_bid = $opted_users[0]; //selected in asc order
        AutoBid::init()->placeAutoBid($this->bid->item_id, $user_with_lowest_max_bid->user_id, $this->bid['bid']);
    }
}
