<?php

namespace App\Events;

use App\Http\Resources\Chat\SentMessageResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat_id;
    public $body;

    /**
     * Create a new event instance.
     *
     * @param $chat_id
     * @param $body
     *
     * @return void
     */
    public function __construct($chat_id, $body)
    {
        $this->chat_id  = $chat_id;
        $this->body     = $body;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat_'.$this->chat_id);
    }


    public function broadcastAs()
    {
        return 'chat_' . $this->chat_id;
    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'message' => new SentMessageResource($this->body),
                'user' => $this->body->user_id,
            ],
        ];
    }
}
