<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 11/28/20
 * Time: 11:59 PM
 */

namespace App\Repository;


use App\Models\Item;

class ItemRepository
{
    /**
     * @return Item[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Item::all();
    }
}