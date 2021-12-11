<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    use HasFactory, Notifiable;

    public function notifications()
    {
        return $this->morphMany(DatabaseMemberNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
}
