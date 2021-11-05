<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ReviewFilterRepository;
use App\Http\Repositories\ReviewRepository;

class MessageController extends Controller
{
    /**
     * @var ReviewFilterRepository
     */
    protected $reviewFilterRepository;

    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    public function __construct()
    {
        $this->reviewFilterRepository = app(ReviewFilterRepository::class);
        $this->reviewRepository = app(ReviewRepository::class);
    }

    public function index() {
        $reviews = $this->reviewRepository->getAllUserReviewWithMessages();

        return view('profile.messages', compact('reviews'));
    }

    public function destroy($reviewId)
    {
        $this->reviewRepository->deleteAllUserMessagesByReview($reviewId);

        return back();
    }
}
