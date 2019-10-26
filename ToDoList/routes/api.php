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

Route::post('login', 'API\AuthController@login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', 'API\AuthController@logout');

    Route::get('/user', 'API\UserController@get');

    Route::post('/task', 'API\TaskController@save');
    Route::delete('/task', 'API\TaskController@delete');
    Route::put('/task', 'API\TaskController@update');

    Route::get('/tasks/{status?}', 'API\TaskController@get');
    Route::delete('/tasks', 'API\TaskController@deleteAll');
    Route::delete('/tasks/{status}', 'API\TaskController@deleteByStatus');
});
