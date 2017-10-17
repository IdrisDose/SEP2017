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
Route::get('/', 'PageController@home')->name('index');
Route::get('/home', 'PageController@home')->name('index');

Route::get('/profile/{id}', 'PageController@account')->name('profile');
Route::get('/sponsors', 'PageController@sponsors')->name('sponsors');
Route::get('/students', 'PageController@students')->name('students');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/help', 'PageController@help')->name('help');

Auth::routes();

Route::group(['middleware'=>'auth'], function(){

    //Admin
    Route::get('/admin', 'PageController@admin')->name('admin');

    //User
    Route::get('/dashboard', 'PageController@dash')->name('dashboard');
    Route::put('/updateprofile/{id}', 'FunctionController@editAccount')->name('profile.update');
    Route::post('/avatar', 'FunctionController@updateAvatar')->name('avatar.update');
    Route::post('/user', 'FunctionController@updateFunds')->name('user.addfunds');

    //Task
    Route::get('/task/{id}', 'PageController@task')->name('task');
    Route::get('/tasks', 'PageController@taskList')->name('tasks');

    Route::get('/newtask', 'FunctionController@taskForm')->name('newtask');
    Route::post('/task', 'FunctionController@newTask')->name('task.create');

    //Sponsory
    Route::post('/sponsor', 'FunctionController@newSponsor')->name('sponsor.create');
    Route::get('/sponsor/{id}', 'FunctionController@editSponsor')->name('sponsorship.edit');
    Route::put('/sponsor/{id}', 'FunctionController@saveSponsor')->name('sponsorship.update');
    Route::delete('/sponsor/{id}', 'FunctionController@removeSponsor')->name('sponsor.delete');

    //Documents
    Route::resource('documents', 'DocumentController');
});
