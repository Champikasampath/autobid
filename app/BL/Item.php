<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 11/29/20
 * Time: 8:53 AM
 */

namespace App\BL;


use App\Repository\ItemRepository;

class Item extends Core
{

    /**
     * Item constructor.
     *
     * @param $repository
     */
    public function __construct(ItemRepository $repository)
    {

    }

    /**
     * @return mixed
     */
    public static function init()
    {
        $class = get_called_class();
        return new $class;
    }
}