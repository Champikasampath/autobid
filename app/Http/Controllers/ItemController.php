<?php

namespace App\Http\Controllers;

use App\BL\Bid;
use App\BL\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getAll(Request $request)
    {
        try {
            $term = $request->get('term');
            $sort = $request->get('sort');
            $sort_type = $request->get('sort_type');
            $items_per_page = 10; // retrieve from $request if dynamic
            $items = Item::init()->getAll($items_per_page, $term, $sort, $sort_type);
            return response()->json($items, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displayItemDetailsPage($id)
    {
        $item = Item::init()->get($id);
        $item['highest_bid'] = Bid::init()->getHighestBidByItem($id);
        view()->share('item', $item);
        return view('item.single');
    }
}
