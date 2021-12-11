<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class Subscriber
{
    public function subscribe($events)
    {
        $events->listen('App\Events\InsertComment', function($event){
            User::find(2)->notify(new \App\Notifications\CommentNotification($event->comment));
        });
        $events->listen('Illuminate\Notifications\Events\NotificationSent', function($event){
            $channel = $event->channel;
            $notifiable = $event->notifiable;
            $notifications = $event->notification;
            $response = $event->response;
            \App\Events\InsertNotification::dispatch($response->toJson(), $notifiable->unreadNotifications->toJson(), $notifiable->unreadNotifications->count());
        });
    }
}
