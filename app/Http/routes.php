<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'PetitionController@index');
Route::get('{user}/petitions', 'PetitionController@userIndex');

Route::post('petition/{id}/sign', 'PetitionController@sign');
Route::get('petition/{id}/signatures', 'PetitionController@signatures');

Route::resource('petition', 'PetitionController');
