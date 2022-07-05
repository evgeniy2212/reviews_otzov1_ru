<?php

namespace App\Jobs;

use App\Mail\ChatMessageRemindsEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendChatMessageRemindsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::activeUsers()->whereNotNull('email_verified_at');
        foreach($users->get()->chunk(100) as $users){
            foreach($users as $user){
                if($user->chats->isNotEmpty()){
                    $result = $user->chats()->each(function($item) use($user){
                        $userLastMessageId = optional($item->unreadMessages()
                            ->firstWhere('user_id', $user->id))
                            ->message_id;
                        return $userLastMessageId && $userLastMessageId < optional($item->lastMessage)->id;
                    });
                    if($result){
                        Mail::to($user->email)->send(new ChatMessageRemindsEmail($user->full_name));
                    }
                }
            }
        }
    }
}
