<?php

namespace App\Console\Commands;

use App\Jobs\SendChatMessageRemindsJob;
use Illuminate\Console\Command;

class ChatMessageRemindMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat_message:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch(new SendChatMessageRemindsJob());
    }
}
