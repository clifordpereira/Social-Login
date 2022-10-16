<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockQuote extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'symbol',
        'high',
        'low',
        'price',
    ];
}
