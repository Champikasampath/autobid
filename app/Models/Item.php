<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function bids()
    {
        return $this->hasMany('App\Models\Bid')->orderBy('id', 'desc');
    }
}
