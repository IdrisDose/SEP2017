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

Route::get('/home', 'PageController@home');
Route::get('/dashboard', 'PageController@dash');
Route::get('/login', 'PageController@login');
Route::get('/register', 'PageController@register');
Route::get('/students', 'PageController@students');
Route::get('/sponsors', 'PageController@sponsors');
Route::get('/account', 'PageController@account');
