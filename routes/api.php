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


// routes/web.php
Route::post('/register', 'UserController@register')->middleware('guest');
Route::post('/login', 'UserController@login')->middleware('guest');
Route::post('/update/token', 'UserController@updateToken')->middleware('guest');
