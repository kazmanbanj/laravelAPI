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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostController@index');

Route::get('/post/{post}', 'PostController@show');

Route::post('/post/{post}', 'PostController@store');

Route::put('/post/{post}', 'PostController@update');

Route::delete('/post/{post}', 'PostController@destroy');

Route::post('/restore/{id}', 'PostController@restore');