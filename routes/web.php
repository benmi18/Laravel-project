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


Route::get('/', 'PagesController@school')->name('home');
Route::get('/school', 'PagesController@school');
Route::get('/admin', 'PagesController@admin');

Route::resource('courses', 'CoursesController');
Route::resource('students', 'StudentsController');
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');
