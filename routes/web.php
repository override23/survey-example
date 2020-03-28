<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('survey-start'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/survey/start', 'SurveyController@start')->name('survey-start');
    Route::get('/survey/done', 'SurveyController@done')->name('survey-done');
    Route::get('/survey/question/{id}', 'SurveyController@question')->name('survey-question');
    Route::post('/survey/question/{id}', 'SurveyController@questionSubmit')->name('survey-question-submit');
});
//Route::get('/home', 'HomeController@index')->name('home');
