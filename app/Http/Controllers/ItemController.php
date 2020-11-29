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
        $limit = $request->get('length');
        $search = $request->get('search');

//        return Item::init()->getAll($start, $limit, $search);
        return array(
            [
                'thumbnail' => 'https://image.shutterstock.com/image-vector/sample-stamp-grunge-texture-vector-260nw-1389188327.jpg',
                'description' => 'test description',
                'bid' => '5',
            ],
            [
                'thumbnail' => 'https://image.shutterstock.com/image-vector/sample-stamp-grunge-texture-vector-260nw-1389188327.jpg',
                'description' => 'test description',
                'bid' => '5',
            ]
        );
    }
}
