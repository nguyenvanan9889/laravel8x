<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Two extends Model
{
    use HasFactory;
    public function three()
    {
        return $this->hasOne(Three::class, 'idsp', 'idsp');
    }
}
