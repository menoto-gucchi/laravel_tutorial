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

Route::get('showTodo/list', 'ShowTodoController@list')->name('list');

Route::get('showTodo/detail', 'ShowTodoController@detail')->name('detail');

Route::get('showTodo/search', 'ShowTodoController@search')->name('search');

Route::get('makeTodo/input', 'MakeTodoController@input')->name('makeInput');

Route::get('makeTodo/confirm', 'MakeTodoController@confirm')->name('makeConfirm');

Route::get('makeTodo/complete', 'MakeTodoController@complete')->name('makeComplete');

Route::get('updateTodo/input', 'UpdateTodoController@input')->name('updateInput');

Route::get('updateTodo/confirm', 'UpdateTodoController@confirm')->name('updateConfirm');

Route::get('updateTodo/complete', 'UpdateTodoController@complete')->name('updateComplete');

Route::get('deleteTodo/confirm', 'DeleteTodoController@confirm')->name('deleteConfirm');

Route::get('deleteTodo/complete', 'DeleteTodoController@complete')->name('deleteComplete');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


