<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'store',
        'item',
        'price',
        'percent_off',
        'category',
        'image_url',
    ];

    protected $casts = [
        'price' => 'float',
        'percent_off' => 'integer',
    ];

    // The price after the discount is applied.
    public function getFinalPriceAttribute(): float
    {
        return round($this->price - ($this->price * $this->percent_off / 100), 2);
    }
}
