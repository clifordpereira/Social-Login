<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockQuote extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'symbol',
        'high',
        'low',
        'price',
    ];
}
