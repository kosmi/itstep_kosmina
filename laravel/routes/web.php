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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('logout', 'HomeController@logout');
Route::get('/model', 'HomeController@model');

Route::group(['middleware'=>'auth'], function () {
    Route::resource('subscribers', 'SubscriberController');
    Route::get('/subscriber/list', 'SubscriberController@lists');
    Route::resource('lists', 'ListController');
    Route::get('/send-email', 'SendController@form');
    Route::post('/send-email', 'SendController@send');
   
});
Route::post('/language-chooser', 'LanguageController@chooser');
 Route::post('language', array( 
	'before'=>'csrf',
	'as' =>'language-chooser',
	'uses'=>'LanguageController@chooser'
	))->middleware('locale');

