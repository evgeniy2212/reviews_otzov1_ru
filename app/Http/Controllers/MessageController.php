<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMessageRequest;
use App\Http\Resources\MessageSendResource;
use App\Models\Message;
use App\Models\Review;

class MessageController extends Controller
{
    public function addReviewMessage(SaveMessageRequest $request){
        $fromUser = auth()->user()->id;
        $request->merge(['from' => $fromUser]);
        $toUser = $this->getToUserId($request->review_id);
        $request->merge(['to' => $toUser]);
        $message = Message::create($request->all());

        return new MessageSendResource([
            $message
        ]);
    }

    private function getToUserId($reviewId){
        $review = Review::find($reviewId);
        $toUser = $review->user->id;
        $companionId = $review->messages->pluck('from')->diff([auth()->user()->id]);

        return $toUser == auth()->user()->id
            ? ($companionId->count() ? $companionId->first() : auth()->user()->id)
            : $toUser;
    }
}
