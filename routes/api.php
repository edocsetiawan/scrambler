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

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('getme','App\Http\Controllers\Api\UserController@userDetail');
    Route::post('logout','App\Http\Controllers\Api\UserController@logout');
});
