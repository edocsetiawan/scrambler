<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login','App\Http\Controllers\Api\UserController@login');
Route::post('register','App\Http\Controllers\Api\UserController@register');
Route::get('wordlist','App\Http\Controllers\Api\GameController@getWords');
Route::post('add-word','App\Http\Controllers\Api\GameController@addWords');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('getme','App\Http\Controllers\Api\UserController@userDetail');
    Route::post('logout','App\Http\Controllers\Api\UserController@logout');
    Route::post('update-score','App\Http\Controllers\Api\GameController@updateScore');
});
