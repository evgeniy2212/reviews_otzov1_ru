<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Review;
use App\Models\User;
use App\Observers\CommentObserver;
use App\Observers\MessageObserver;
use App\Observers\ReviewObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Review::observe(ReviewObserver::class);
        Comment::observe(CommentObserver::class);
        Message::observe(MessageObserver::class);
        User::observe(UserObserver::class);
    }
}
