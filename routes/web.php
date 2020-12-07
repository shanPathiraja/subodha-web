<?php

use Illuminate\Support\Facades\Route;

/*
 * Landing Page...
 */
Route::get('/', 'PublicPageController@index')->name('welcome');

Route::get('/tests', function () {
    return view('tests');
})->name('tests');

/*
 * About Page...
 */
Route::get('/about/{page?}', 'PublicPageController@show')->name('about');

/*
 * Update Profile Details Route...
 */
Route::put('/about/{profile}', 'PublicPageController@update')
    ->name('about.update')
    ->middleware('auth');

/*
 * Resume Page...
 */
Route::get('/resume', 'PublicPageController@resume')->name('resume');

/*
 * Public View Blog Posts Routes...
 */
Route::group([
    'prefix' => 'blog',
], function (): void {
    /*
     * Blog Page...
     */
    Route::get('/', 'BlogPostController@index')->name('blog.posts');

    /*
     * Post With Category Route...
     */
    Route::get('/posts/{category}', 'BlogPostController@index')->name('blog.category');

    /*
     * Single Blog Post Route...
     */
    Route::get('/{post}', 'BlogPostController@show')->name('blog.post');
});

/*
 * Public View Research Paper Routes...
 */
Route::group([
    'prefix' => 'publications',
], function (): void {
    /*
     * Research Page...
     */
    Route::get('/', 'ResearchPaperController@index')->name('publications.papers');

    /*
     * Paper With Category Route...
     */
    Route::get('/papers/{category}', 'ResearchPaperController@index')->name('publications.category');

    /*
     * Single Research Paper Route...
     */
    Route::get('/{paper}', 'ResearchPaperController@show')->name('publications.paper');
});

/*
 * New Event Route...
 */
Route::post('/events', 'EventController@store')->name('events.store');

/*
 * Authentication Routes...
 */
Auth::routes(['register' => false]);

/*
 * Authenticated Users Routes...
 */
Route::group([
    'middleware' => 'auth',
], function (): void {
    /*
     * Dashboard Page...
     */
    Route::get('/home', 'HomeController@show')->name('home');

    /*
     * Activity Log Page...
     */
    Route::get('/activities', 'HomeController@activities')->name('activities');

    /*
     * Testing Routes...
     */
    Route::get('/testing', 'HomeController@testing')->name('testing');

    /*
     * Posts Resources Routes...
     */
    Route::resource('/posts', 'PostController', [
        'except' => ['show'],
    ]);

    /*
     * Post With Category Route...
     */
    Route::get('/posts/{category}', 'PostController@index')->name('posts.category');

    /*
     * Papers Resources Routes...
     */
    Route::resource('/papers', 'PaperController', [
        'except' => ['show'],
    ]);

    /*
     * Papers With Category Route...
     */
    Route::get('/papers/{category}', 'PaperController@index')->name('papers.category');

    /*
     * Category Resources Routes...
     */
    Route::resource('/categories', 'CategoryController', [
        'except' => ['show', 'edit', 'create'],
    ]);

    /*
     * Image Upload Route...
     */
    Route::post('/upload/image/{user?}', 'ImageUploadController')->name('image.upload');

    /*
     * User Resources Routes...
     */
    Route::resource('/users', 'Auth\ProfileController', [
        'except' => ['index', 'create'],
    ]);

    /*
     * User Password Reset Route.
     */
    Route::put(
        '/users/{user}/update/password',
        'Auth\ResetPasswordController@update'
    )->name('users.password');
});
