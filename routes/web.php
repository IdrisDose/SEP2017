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
    Route::post('/avatar', 'PageController@updateavatar')->name('avatar.update');
    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::get('/dashboard/{type}', 'HomeController@dash')->name('dashboard');
    Route::get('/task/{id}', 'FunctionController@task')->name('task');
    Route::get('/tasks', 'FunctionController@tasklist')->name('tasks');
    Route::get('/newtask', 'FunctionController@taskform')->name('newtask');
    Route::post('/tasks', 'FunctionController@newtask')->name('task.create');
    Route::put('/updateprofile/{id}', 'PageController@editaccount')->name('profile.update');
    Route::post('/sponsor', 'FunctionController@newsponsor')->name('sponsor.create');
    Route::delete('/sponsor/{id}', 'FunctionController@removesponsor')->name('sponsor.delete');
    Route::get('/sponsor/{id}', 'FunctionController@editsponsor')->name('editsponsorship');
    Route::PUT('/sponsor/{id}', 'FunctionController@savesponsor')->name('sponsor.save');

});
