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
Route::get('blog', 'PagesController@blog');
Route::get('about-us', 'PagesController@about');
Route::get('submit', 'ContactFormController@submit');
Route::post('submit', 'ContactFormController@submit')->middleware('ajax');
Route::resource('tickets', 'ServicesController');
// JSON REQUESTS -------------------
Route::get('/getallwebsites', 'UserDataController@getallwebsites')->middleware('ajax');


// Route::get('/', ['as' => 'home_path', 'uses' => 'DashboardController@index']);

// Route::get('/about', 'PagesController@about');

// Route::get('/schedule', 'PagesController@schedule');


// Route::resource('ticket', 'TicketController');

// Route::resource('posts', 'PostsController');
Auth::routes();
// Route::get('/services', 'PagesController@services');
Route::post('services/store', 'ServicesController@store')->middleware('ajax');


Route::get('/dashboard', 'DashboardController@index');
Route::get('/edituser', 'DashboardController@editUser');
Route::post('/updateuser', 'DashboardController@updateUser');

Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');


Route::resource('tasks', 'TaskController');
Route::resource('subjects', 'SubjectController');

// JSON REQUESTS -------------------
Route::get('/getmainaddress', 'UserDataController@getmainaddress')->middleware('ajax');
Route::get('/getalladdresses', 'UserDataController@getalladdresses')->middleware('ajax');
Route::post('/addressadd', 'UserDataController@addressAdd')->middleware('ajax');
Route::get('/getallservices', 'ServiceDataController@getallservices');


// Route::get('/add-to-cart/{id}', "ProductController@getAddToCart");
