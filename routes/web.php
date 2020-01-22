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

Route::get('/', 'ShowTodoController@list');

Route::get('makeTodo/input', 'MakeTodoController@input');

Route::get('makeTodo/confirm', 'MakeTodoController@confirm');

Route::get('makeTodo/complete', 'MakeTodoController@complete');

