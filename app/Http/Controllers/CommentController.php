<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addReviewComment(SaveCommentRequest $request){
        $request->merge(['user_id' => auth()->user()->id]);
        $comment = Comment::create($request->all());

        return [
            'body' => $comment->body,
            'review_id' => $comment->review_id,
            'comment_id' => $comment->id
        ];
    }

    public function commentReaction(Request $request){
        $comment = Comment::find($request->id);
        $comment->update([$request->reaction => $request->value]);
        $request->user_reaction_increase
            ? auth()->user()->increment('reaction_count', 1)
            : auth()->user()->decrement('reaction_count', 1);
    }
}
