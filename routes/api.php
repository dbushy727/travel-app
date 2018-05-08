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

Route::middleware('auth:api')->group(function () {
    Route::prefix('activities')->group(function () {
        Route::get('/', 'ActivitiesController@index')->name('activities');
        Route::post('/', 'ActivitiesController@store');
        Route::get('/{activity}', 'ActivitiesController@show')->name('activity');
        Route::put('/{activity}', 'ActivitiesController@update');
        Route::delete('/{activity}', 'ActivitiesController@destroy');

        Route::get('/{activity}/members', 'ActivityMembersController@index')->name('activity-members');
        Route::post('/{activity}/members/{user}', 'ActivityMembers@store');
        Route::delete('/{activity}/members/{user}', 'ActivityMembers@destroy');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', 'TagsController@index')->name('tags');
        Route::post('/', 'TagsController@store');

        Route::get('/{tag}/activities', 'ActivityTagsController@index');
        Route::post('/{tag}/activities/{activity}', 'ActivityTagsController@store');
        Route::delete('/{tag}/activities/{activity}', 'ActivityTagsController@destroy');
    });
});
