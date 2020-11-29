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
        parent::__construct($repository);
    }

    public function getAll($start = 0, $length = 10, $term = '')
    {
        
    }
}