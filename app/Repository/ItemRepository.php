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
            return Item::with('bids')->where('id', $id)->first();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $length
     * @param null $term
     * @param string $sort
     * @param string $sort_type
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \Exception
     */
    public function getAll($length = 10, $term = null, $sort = 'id', $sort_type = 'desc')
    {
        try {
            $query = item::query();

            if(!empty($term)) {
                $query->where('title', 'LIKE', "%$term%");
                $query->orWhere('description', 'LIKE', "%$term%");
            }
            $query->OrderBy($sort, $sort_type);
            return $query->paginate($length);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
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