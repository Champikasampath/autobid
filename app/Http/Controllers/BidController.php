<?php

namespace App\Http\Controllers;

use App\BL\Bid;
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
        $request->validate([
            'bid' => 'required'
        ]);

        try {
            $data = $request->all();
            $data['bidder_id'] = 1; //TODO replace hardcoded user
            $res = Bid::init()->placeBid($data);
            return response()->json($res, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

}
