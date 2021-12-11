<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'notifiable_id', 'id');
    }
}
