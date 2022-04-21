<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('v1/posts', 'PostController@index');

Route::get('v1/post/{post}', 'PostController@show');

Route::post('v1/posts', 'PostController@store');

Route::put('v1/post/{post}', 'PostController@update');

Route::delete('v1/post/{post}', 'PostController@destroy');

Route::delete('v2/post/{post}', 'PostController@permanentDestroy');

Route::post('v1/restore/{id}', 'PostController@restore');

Route::delete('v3/post/{post}', 'PostController@permanentDestroySoftDeleted');