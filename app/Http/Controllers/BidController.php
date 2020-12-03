<?php

namespace App\Http\Controllers;

use App\BL\Bid;
use App\BL\Item;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function placeBid(Request $request)
    {
        $user = $request->session()->get('AuctionUser');

        $request->validate([
            'bid' => 'required'
        ]);

        try {
            $data = $request->all();

            $item = Item::init()->get($data['item_id']);
            $highest_bid_on_item = Bid::init()->getHighestBidByItem($data['item_id']);

            if($item['bid_end'] < date("Y-m-d hh-mm-ss")) {
                throw new \Exception('Bidding time expired!');
            }

            if($item['min_price'] > $data['bid'] ) {
                throw new \Exception('Bid should be higher than the min price!');
            }

            if($data['bid'] <= $highest_bid_on_item) {
                throw new \Exception('Bid should be higher than the existing highest bid!');
            }

            $data['bidder_id'] = $user['id'];
            $res = Bid::init()->placeBid($data);
            return response()->json($res, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
