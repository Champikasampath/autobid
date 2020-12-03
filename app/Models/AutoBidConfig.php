<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoBidConfig extends Model
{
    use HasFactory;

    protected $table = 'auto_bidding_configs';

    protected $fillable = [
        'user_id',
        'max_bid_amount'
    ];
}
