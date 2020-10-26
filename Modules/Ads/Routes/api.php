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


/********** start tags route ***********/
Route::group(['prefix' => 'tags'], function () {

    Route::get('/', ['uses' => 'TagController@index']);

    Route::post('create', ['uses' => 'TagController@store']);

    Route::get('{id}', ['uses' => 'TagController@show']);

    Route::patch('{id}', ['uses' => 'TagController@update']);

    Route::delete('{id}', ['uses' => 'TagController@destroy']);
});
/********** end tags route ***********/

