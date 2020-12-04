<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoBid extends Model
{
    use HasFactory;

    protected $table = 'auto_biddings';

    protected $fillable = [
        'item_id',
        'user_id'
    ];

    public function config()
    {
        return $this->hasOne('App\Models\AutoBidConfig', 'user_id', 'user_id');
    }
}
