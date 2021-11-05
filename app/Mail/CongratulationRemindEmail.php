<?php

namespace App\Mail;

use App\Models\ImportantDateRemind;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CongratulationRemindEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $remind;

    /**
     * Create a new message instance.
     *
     * @param ImportantDateRemind $remind
     *
     * @return void
     */
    public function __construct(ImportantDateRemind $remind)
    {
        $this->remind = $remind;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown(
            'mails.' . 'congratulation_remind',
            [
                'user' => $this->remind->importantDate->user->full_name,
                'date' => $this->remind->importantDate->important_date,
                'name' => $this->remind->importantDate->full_name,
                'date_type' => $this->remind->importantDate->type->title,
                'date_remind' => $this->remind->importantDate->important_date_date,
            ]
        );
    }
}
