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
     * @param int $start
     * @param int $length
     * @param string $term
     *
     * @return Item[]|\Illuminate\Database\Eloquent\Collection|string
     */
    public function getAll($start = 0, $length = 10, $term = null)
    {
        try {
            $query = item::query();

            if(!empty($term)) {
                $query->where('title', 'LIKE', "%$term%");
                $query->where('description', 'LIKE', "%$term%");
            }

            if($length != 0) {
                $query->limit($length);
                $query->offset($start);
            }
            return $query->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}