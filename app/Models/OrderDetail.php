<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'product_id');
    }
}
