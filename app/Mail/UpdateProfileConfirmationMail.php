<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateProfileConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reviews4Results Confirmation')
            ->markdown('mails.profile_updated',
            [
                'name' => $this->name,
            ]
        );
    }
}
