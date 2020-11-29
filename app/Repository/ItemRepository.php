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
    public function getAll()
    {
        return Item::all();
    }
}