<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'public.'], function () {

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('login', function () {
        return view('public.login');
    })->name('login');

    Route::get('register', function () {
        return view('public.register');
    })->name('register');

});

Route::group(['as' => 'private.', 'middleware' => ['auth']], function () {

    Route::get('dashboard', function () {
        return view('private.dashboard');
    })->name('dashboard');

    Route::get('todo', function () {
        return view('private.todo.listar');
    })->name('todo');

    Route::post('todo/table', 'WEB\ToDoTable@get')
        ->name('todo.table');

    Route::get('todo/add', function () {
        return view('private.dashboard');
    })->name('todo.add');

    Route::get('todo/rm', function () {
        return view('private.dashboard');
    })->name('todo.rm');

});
