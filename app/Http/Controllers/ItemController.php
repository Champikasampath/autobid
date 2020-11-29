<?php

namespace App\Http\Controllers;

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
        $term = $request->get('term');
        return Item::init()->getAll(10, $term);
    }

    public function displayItemDetailsPage($id)
    {
        $item = Item::init()->get($id);
        view()->share('item', $item);
        return view('item.single');
    }
}
