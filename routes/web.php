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

Route::get('/profile', 'ProfileController@profile');

Route::get('/about-us', function () {
    return view('layouts/aboutus');
});

Route::get('/faqs', function () {
    return view('layouts/faqs');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
