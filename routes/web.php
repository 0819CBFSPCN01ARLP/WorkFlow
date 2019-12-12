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

Route::get('/about-us', 'HomeController@aboutus');
Route::get('/faqs', 'HomeController@faq');

Route::get('/edit-post/{id}', 'EditController@editPost');
Route::post('/edit-post', 'EditController@editPostEdit');

Route::post('/profile', 'PostController@addPost');
Route::post('/profileUploadImg', 'ProfileController@editImg');

Route::post('/home', 'PostController@addPost');
Route::delete('/home', 'PostController@deletePost');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts', 'PostController@addPost');
Route::delete('/posts', 'PostController@deletePost');

//Route::post('/profile', 'ProfileController@editProfile');

Auth::routes();


Route::post('/comment', 'CommentController@addComment');