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

/********** start categories route ***********/
Route::group(['prefix' => 'categories'], function () {

    Route::get('/', ['uses' => 'CategoryController@index']);

    Route::post('create', ['uses' => 'CategoryController@store']);

    Route::get('{id}', ['uses' => 'CategoryController@show']);

    Route::patch('{id}', ['uses' => 'CategoryController@update']);

    Route::delete('{id}', ['uses' => 'CategoryController@destroy']);
});
/********** end categories route ***********/


/********** start categories route ***********/
Route::group(['prefix' => 'ads'], function () {

    Route::get('/', ['uses' => 'AdsController@index']);

    Route::post('create', ['uses' => 'AdsController@store']);

    #filte part
    Route::group(['prefix' => 'filter'], function () {

        Route::get('category/{id}', ['uses' => 'AdsController@filterByCategory']);
        Route::get('tag/{id}', ['uses' => 'AdsController@filterByTag']);
    });

    #advertiser part
    Route::get('advertiser/{id}', ['uses' => 'AdsController@advertiserAds']);

});
/********** end categories route ***********/

