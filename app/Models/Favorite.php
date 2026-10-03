<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'firebase_uid',
        'discount_id',
    ];

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
