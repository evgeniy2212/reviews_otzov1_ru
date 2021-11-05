<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Auth::routes();

        Auth::routes(['verify' => true]);

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('test-creation-review/{review_item}', 'ReviewController@testCreate')->name('test-creation-review');

        Route::get('/test', 'HomeController@test');
        Route::get('/send-message', 'HomeController@sendMessage');
        Route::group(['prefix' => 'ajax'], function() {
            Route::get('regions/{country}', 'RegionController');
            Route::get('groups/{group}', 'ReviewCategoryGroupController');
            Route::get('bad-words', 'InfoController@getBadWords')->name('bad-words');
        });

        Route::group([
            'prefix' => 'profile',
            'middleware' => [ 'auth', 'verified' ],
        ], function(){
            Route::get('info', 'Profile\PersonalInfoController@index')->name('profile-info');
            Route::resource('reviews', 'Profile\ReviewController')->only([
                'index', 'edit', 'update', 'destroy'
            ])->names('profile-reviews');
            Route::patch('preupdating-review/{review}', 'Profile\ReviewController@preupdating')->name('preupdating-review');
            Route::resource('comments', 'Profile\CommentController')->only([
                'index', 'edit', 'update', 'destroy'
            ])->names('profile-comments');
            Route::get('search-comment', 'Profile\CommentController@search')->name('searchUserComments');
            Route::get('messages', 'Profile\MessageController@index')->name('profile-messages');
            Route::delete('messages/{id}', 'Profile\MessageController@destroy')->name('delete-profile-message');
            Route::get('banners', 'Profile\BannerController@index')->name('banners');
            Route::get('changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('get-change-password');
            Route::post('changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');
            Route::patch('update-persona-info', 'Profile\PersonalInfoController@updatePersonalInfo')->name('updatePersonalInfo');
            Route::post('save-banner', 'Profile\BannerController@save')->name('saveBanner');
            Route::resource('congratulations', 'Profile\CongratulationController')->names('profile-congratulations');
            Route::get('index-private', 'Profile\CongratulationController@indexPrivate')->name('index-private');
            Route::delete('delete-private/{is_owner}/{congratulation}', 'Profile\CongratulationController@destroyPrivate')->name('delete-private-congratulations');
            Route::resource('important-date', 'Profile\ImportantDateController')->only([
                'index', 'store'
            ])->names('profile-important-date');
            Route::post('profile-important-dates-delete', 'Profile\ImportantDateController@deleteDates')->name('profile-important-dates-delete');
            Route::group(['prefix' => 'ajax'], function() {
                Route::get('check-user', 'Profile\CongratulationController@checkUser')->name('check-user');
                Route::get('read-private-congratulation/{congratulation}', 'Profile\CongratulationController@readPrivate')->name('read-private-congratulation');
            });
        });

        Route::group([
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => 'Admin',
            'middleware' => ['auth', 'verified', 'twofactor']
        ], function(){
            Route::resource('/contacts', 'ContactController')->only('index', 'store');
            Route::resource('/banners', 'BannerController')->only('index', 'store', 'update');
            Route::resource('/users', 'UserController')->only('index', 'update');
            Route::resource('/reviews', 'ReviewController')->only('index', 'update');
            Route::resource('/users_reviews', 'UserReviewController')->only('show', 'update');
            Route::resource('/user_congratulations', 'UserCongratulationController')->only('show', 'update');
            Route::resource('/complains', 'ComplainController')->only('index', 'update');
            Route::resource('/moderations', 'ReviewModerationController')->only('index');
            Route::resource('/data', 'DataController')->only('index');
            Route::patch('/complain-review/{review}', 'ComplainController@updateComplainReview')->name('update_complain_review');
            Route::patch('/moderation-review/{review}', 'ReviewModerationController@updateModerationReview')->name('update_moderation_review');
            Route::get('search-user', 'UserController@search')->name('searchUsers');
            Route::get('search-review', 'ReviewController@search')->name('searchReviews');
            Route::get('/info_page/{info_page}', 'InfoPageController@index')->name('info_page');
            Route::post('/info_page', 'InfoPageController@store')->name('save_info_page');
            Route::get('create-review-logo/{review}', 'LogoController@createLogo')->name('create_review_logo');
            Route::get('edit-review-logo/{logo}', 'LogoController@edit')->name('edit_review_logo');
            Route::post('save-logo/{review}', 'LogoController@save')->name('save_logo');
            Route::patch('/update-logo/{logo}', 'LogoController@update')->name('update_logo');
            Route::delete('/delete-logo/{id}', 'LogoController@destroy')->name('delete_logo');
        });

        Route::group([
            'prefix' => 'reviews',
        ], function(){
            Route::get('/{review_item}', 'ReviewController@index')->name('reviews');
            Route::get('/show/{review}', 'ReviewController@show')->name('show-review');
            Route::get('/presaving-show/{review}', 'ReviewController@presavingShow')->name('presavingShow-review');
            Route::get('create/{review_item}', 'ReviewController@create')
                ->name('create-review')
                ->middleware('auth', 'verified');
            Route::post('save', 'ReviewController@save')
                ->name('save-review')
                ->middleware('auth', 'verified');
            Route::post('presaving', 'ReviewController@presaving')
                ->name('presaving-review')
                ->middleware('auth', 'verified');
            Route::post('confirm-saving-review', 'ReviewController@confirmSaving')
                ->name('confirmSaving-review')
                ->middleware('auth', 'verified');
        });

        Route::get('search', 'ReviewController@search')->name('search');
        Route::get('term-of-service', 'InfoController@termOfService')->name('term-of-service');
        Route::get('term-of-conditions', 'InfoController@termOfConditions')->name('term-of-conditions');
        Route::get('privacy-policy', 'InfoController@privacyPolicy')->name('privacy-policy');
        Route::get('get-in-touch', 'InfoController@getInTouch')->name('get-in-touch');
        Route::get('save-shortcut', 'InfoController@saveShortcutInstruction')->name('save-shortcut');
        Route::post('send-touch-info', 'InfoController@sendTouchInfo')->name('send-touch-info');
        Route::get('share', 'InfoController@share')->name('share');
        Route::post('share-form', 'InfoController@shareSend')->name('share-send');
        Route::post('/complain-review', 'ComplainController@addComplain')->name('complain_review');

        Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
        Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);
});

Route::group(['prefix' => 'ajax'], function() {
    Route::post('review-reaction', 'ReviewController@reviewReaction')->name('review-reaction');
    Route::post('review-message-read', 'ReviewController@reviewReadMessages')->name('review-message-read');
    Route::post('review-comment-reaction', 'CommentController@commentReaction')->name('review-comment-reaction');
    Route::post('review-add-comment', 'CommentController@addReviewComment')->name('review-add-comment');
    Route::post('review-send-message', 'MessageController@addReviewMessage')->name('review-send-message');
});

//Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');
