<?php

namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewDisableNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $review;

    /**
     * Create a new message instance.
     *
     * @param Review $review
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You`ve Been Reviewed on ' . config('app.name'))
            ->markdown(
            'mails.' . 'review_disable_notification',
            [
                'url' => route('show-review', ['review' => $this->review->id])
            ]
        );
    }
}
