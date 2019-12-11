<?php

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

Route::get('/', 'HomeController@index');

Route::get('/profile/{id}', 'ProfileController@profile');

Route::get('/about-us', function () {
    return view('layouts/aboutus');
});

Route::get('/faqs', function () {
    return view('layouts/faqs');
});

Route::get('/edit-post/{id}', 'EditController@editPost');
Route::post('/edit-post', 'EditController@editPostEdit');

Route::post('/profile', 'PostController@addPost');
Route::delete('/profile', 'PostController@deletePost');

Route::post('/home', 'PostController@addPost');
Route::delete('/home', 'PostController@deletePost');

Route::post('/posts', 'PostController@addPost');
Route::delete('/posts', 'PostController@deletePost');

//Route::post('/profile', 'ProfileController@editProfile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/comment', 'CommentController@addComment');