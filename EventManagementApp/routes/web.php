<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


// User registration routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// User login routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');


Route::get('/user/profile', 'UserController@showProfile')->name('user.profile')->middleware('auth');
Route::get('/user/edit-profile', 'UserController@editProfile')->name('user.edit_profile')->middleware('auth');
Route::post('/user/update-profile', 'UserController@updateProfile')->name('user.update_profile')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/events/create', 'EventController@create')->name('events.create');
    Route::post('/events', 'EventController@store')->name('events.store');
    Route::get('/events/{event}/edit', 'EventController@edit')->name('events.edit');
    Route::put('/events/{event}', 'EventController@update')->name('events.update');
});



// User logout route
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
