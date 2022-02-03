<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\UserController@index');
Route::get('/add-user', 'App\Http\Controllers\UserController@user_form');
Route::get('/edit-user/{user_id}', 'App\Http\Controllers\UserController@user_form');
Route::post('/save-user', 'App\Http\Controllers\UserController@save_user_form');
