<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $content;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username, $content)
    {
        $this->username = $username;
        $this->content = $content;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat'.$this->username);
    }
    public function broadcastAs()
    {
        return 'chat';
    }
    public function broadcastWith()
    {
        return ['content' => $this->content];
    }
}
