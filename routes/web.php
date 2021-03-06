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

Auth::routes();
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware'=> 'auth'], function() {
    Route::get('/survey/create','SurveyController@create');
    Route::post('/survey','SurveyController@store');

    Route::post('/question','QuestionController@store');

    Route::get('/profile/{user}','ProfileController@show');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/survey/{survey}','SurveyController@show');
Route::patch('/survey/{survey}','SurveyController@update');


