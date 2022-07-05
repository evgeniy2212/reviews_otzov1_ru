<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatContactApprovingEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $contactName;
    private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $url, string $name,string $contactName)
    {
        $this->url = $url;
        $this->name = $name;
        $this->contactName = $contactName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.chat_approving',
            [
                'url' => $this->url,
                'contact_name' => $this->contactName,
                'name' => $this->name,
            ]
        )->subject('Contact confirmation');
    }
}
