<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InsertNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $notifications;
    public $unReadNotifications;
    public $unreadNotificationCount;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notifications, $unReadNotifications, $unreadNotificationCount)
    {
        $this->notifications = $notifications;
        $this->unReadNotifications = $unReadNotifications;
        $this->unreadNotificationCount = $unreadNotificationCount;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('laravel8x-notifications');
    }

    public function broadcastAs()
    {
        return 'notifications';
    }
}
