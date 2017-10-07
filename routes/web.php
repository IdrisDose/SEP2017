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
Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'PageController@index')->name('index');
Route::get('/dashboard', 'PageController@dash')->name('dashboard');
Route::get('/register', 'PageController@register')->name('register');
Route::get('/students', 'PageController@students')->name('students');
Route::get('/sponsors', 'PageController@sponsors')->name('sponsors');
Route::get('/profile', 'PageController@account')->name('profile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
