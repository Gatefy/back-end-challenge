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

Route::group(['as'=>'public.'], function () {

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('login', function () {
        return view('login');
    })->name('login');

    Route::get('register', function () {
        return view('register');
    })->name('register');

});

Route::group(['as'=>'private.'], function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('todo', function () {
        return view('todo.listar');
    })->name('todo');

    Route::get('todo/add', function () {
        return view('dashboard');
    })->name('todo.add');

    Route::get('todo/rm', function () {
        return view('dashboard');
    })->name('todo.rm');
});
