<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class One extends Model
{
    use HasFactory;
    public function two()
    {
        return $this->hasOne(Two::class, 'idsp', 'idsp')->where('code', $this->code);
    }
}
