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


// Route::get('/{name}', function($name){
//   return "Hello " . $name;
// });

// Route::get('/', 'PagesController@index');

Route::get('/', ['as' => 'home_path', 'uses' => 'PagesController@index']);

Route::get('/about', 'PagesController@about');

Route::get('/schedule', 'PagesController@schedule');

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/edituser', 'DashboardController@editUser');
Route::post('/updateuser', 'DashboardController@updateUser');

Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');
