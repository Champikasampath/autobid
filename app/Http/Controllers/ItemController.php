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
        $start = $request->get('start');
        $length = $request->get('length');
        $term = $request->get('term');

        return Item::init()->getAll($start, $length, $term);
    }
}
