<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 12/3/20
 * Time: 10:13 PM
 */

namespace App\BL;


use App\Repository\AutoBidRepository;

class AutoBid extends Core
{
    public function __construct()
    {
        parent::__construct(app(AutoBidRepository::class));
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function delete($data)
    {
        return $this->repository->delete($data);
    }

    /**
     * @param $user_id
     * @param $item_id
     *
     * @return mixed
     */
    public function get($user_id, $item_id)
    {
        return $this->repository->get($user_id, $item_id);
    }
}