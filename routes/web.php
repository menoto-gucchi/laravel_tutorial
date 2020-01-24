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

// Route::get('/', function(){return view('welcome');});

Route::get('showTodo/list', 'ShowTodoController@list');

Route::get('showTodo/detail', 'ShowTodoController@detail');

Route::get('showTodo/search', 'ShowTodoController@search');

Route::get('makeTodo/input', 'MakeTodoController@input');

Route::get('makeTodo/confirm', 'MakeTodoController@confirm');

Route::get('makeTodo/complete', 'MakeTodoController@complete');

Route::get('updateTodo/input', 'UpdateTodoController@input');

Route::get('updateTodo/confirm', 'UpdateTodoController@confirm');

Route::get('updateTodo/complete', 'UpdateTodoController@complete');

Route::get('deleteTodo/confirm', 'DeleteTodoController@confirm');

Route::get('deleteTodo/complete', 'DeleteTodoController@complete');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


