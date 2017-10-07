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
Route::get('/register', 'PageController@register')->name('register');
Route::get('/students', 'PageController@students')->name('students');
Route::get('/sponsors', 'PageController@sponsors')->name('sponsors');
Route::get('/profile/{id}', 'PageController@account')->name('profile');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/help', 'PageController@help')->name('help');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::get('/dashboard', 'HomeController@dash')->name('dashboard');
    Route::get('/task/{id}', 'TaskController@task')->name('task');
    Route::get('/tasks', 'TaskController@tasklist')->name('tasks');
    Route::get('/newtask', 'TaskController@taskform')->name('newtask');
    Route::post('/tasks', 'TaskController@newtask')->name('task.create');
    Route::put('/updateprofile/{id}', 'PageController@editaccount')->name('profile.update');
});
