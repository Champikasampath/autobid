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
    public function get($id)
    {
        try {
            return Item::find($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $start
     * @param int $length
     * @param string $term
     *
     * @return Item[]|\Illuminate\Database\Eloquent\Collection|string
     */
    public function getAll($length = 10, $term = null)
    {
        try {
            $query = item::query();

            if(!empty($term)) {
                $query->where('title', 'LIKE', "%$term%");
                $query->orWhere('description', 'LIKE', "%$term%");
            }

            return $query->paginate($length);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return int
     */
    public function getCount()
    {
        $all = item::all();
        $count = $all->count();
        return $count;
    }
}