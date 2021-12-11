<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

class DatabaseMemberNotification extends DatabaseNotification
{
    protected $table = 'member_notifications';
}
