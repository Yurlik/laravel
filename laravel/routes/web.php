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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

//Route::get('todo', 'TodoController@todo');
//Route::get('todo/{id}', 'TodoController@show');
//Route::post('todo', 'TodoController@create');
//Route::get('todo/{id}/edit', 'TodoController@edit');
//Route::put('todo/{id}', 'TodoController@edit');
//Route::patch('todo/{id}', 'TodoController@update');
Route::resource('todo', 'TodoController');
Route::resource('cat', 'CategoryController');


Route::post('todo/load_data/{from}', 'TodoController@load_data');
Route::post('todo/load_data/{from}/{cat_id}', 'TodoController@load_data_cat');



Route::get('todo/cat/{cat_id}', 'TodoController@todo_cat');

Auth::routes();


