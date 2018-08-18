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


// Route::middleware(['owner'])->group(function(){
//     Route::get('/users/1', 'UsersController@show');
// });
// Route::middleware(['owner'])->group(function () {
//     Route::get('/users/1/edit', 'UsersController@edit');
// });


Route::get('/', 'PagesController@school')->name('home');
Route::get('/school', 'PagesController@school');
Route::get('/admin', 'PagesController@admin');


Route::resource('courses', 'CoursesController');
Route::resource('students', 'StudentsController');
Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/logout', 'HomeController@logout');
