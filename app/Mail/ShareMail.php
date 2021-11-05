<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;

    private $email;

    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $name, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.share',
            [
                'name' => $this->name,
                'message' => $this->message,
                'email' => $this->email
            ]
        )->subject('Reviews4Results.com');
    }
}
