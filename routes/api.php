<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('activities')->group(function () {
    Route::get('/', 'ActivitiesController@index')->name('activities');
    Route::post('/', 'ActivitiesController@store');
    Route::get('/{activity}', 'ActivitiesController@show')->name('activity');
    Route::put('/{activity}', 'ActivitiesController@update');
    Route::delete('/{activity}', 'ActivitiesController@destroy');
});