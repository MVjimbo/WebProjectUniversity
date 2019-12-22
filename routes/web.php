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

Route::get('/', 'PostController@index');/*function () {
    return view('welcome');
});*/

Auth::routes();




Route::get('/post/create', 'PostController@create');
Route::get('/post/{post}', 'PostController@show');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware'=> 'auth'], function() {

    Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');

    Route::get('/post', 'PostController@index');
    Route::post('/post', 'PostController@store');
    Route::delete('/post/{post}', 'PostController@destroy');

    Route::post('like/{post}','LikesController@store');

    Route::post('/comment/{post}', 'CommentController@show');

});
