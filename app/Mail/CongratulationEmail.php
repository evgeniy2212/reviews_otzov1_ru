<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CongratulationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $tepmlate;
    private $subjectContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $subject = '')
    {
        $this->tepmlate = $template;
        $this->subjectContent = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.' . $this->tepmlate)
            ->subject($this->subjectContent);
    }
}
