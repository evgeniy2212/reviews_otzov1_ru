<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientUnreadMessages implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat_id;
    public $client_id;

    /**
     * Create a new event instance.
     *
     * @param $chat_id
     * @param $client_id
     *
     * @return void
     */
    public function __construct($chat_id, $client_id)
    {
        $this->chat_id = $chat_id;
        $this->client_id = $client_id;
    }

    public function broadcastOn()
    {
        return 'client_unread' . $this->client_id;
    }

    public function broadcastAs()
    {
        return 'client_unread' . $this->client_id;
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->chat_id,
        ];
    }
}
