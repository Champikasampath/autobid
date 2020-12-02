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

    public function get($id)
    {
        return $this->repository->get($id);
    }

    /**
     * @param int $length
     * @param string $term
     * @param $sort
     * @param string $sort_type
     *
     * @return mixed
     */
    public function getAll($length = 10, $term = '', $sort, $sort_type = 'desc')
    {
        return $this->repository->getAll($length, $term, $sort, $sort_type);
    }
}