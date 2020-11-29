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
    public function __construct()
    {
        parent::__construct(app(ItemRepository::class));
    }

    /**
     * @param int $start
     * @param int $length
     * @param string $term
     *
     * @return mixed
     */
    public function getAll($start = 0, $length = 10, $term = '')
    {
        return $this->repository->getAll($start, $length, $term);
    }
}