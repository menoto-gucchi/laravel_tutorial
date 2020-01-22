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

Route::post('showTodo/detail', 'ShowTodoController@detail');

Route::post('showTodo/search', 'ShowTodoController@search');

Route::post('makeTodo/input', 'MakeTodoController@input');

Route::post('makeTodo/confirm', 'MakeTodoController@confirm');

Route::post('makeTodo/complete', 'MakeTodoController@complete');

Route::post('updateTodo/input', 'UpdateTodoController@input');

Route::post('updateTodo/confirm', 'UpdateTodoController@confirm');

Route::post('updateTodo/complete', 'UpdateTodoController@complete');

Route::post('deleteTodo/confirm', 'DeleteTodoController@confirm');

Route::post('deleteTodo/complete', 'DeleteTodoController@complete');

