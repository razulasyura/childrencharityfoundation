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

/* Frontend Route */
Route::get('/', 'FrontController@index');
Route::get('/index', 'FrontController@index');
Route::get('/about', 'FrontController@about');
Route::get('/before-and-after', 'FrontController@beforeandafter');
Route::get('/contact', 'FrontController@contact');
Route::get('/gallery', 'FrontController@gallery');
Route::get('/album/{id}', 'FrontController@album');
Route::get('/program/{id}', 'FrontController@program_detail');
Route::get('/blog', 'FrontController@blog');
Route::get('/blog_detail/{id}', 'FrontController@blog_detail');
// Route::get('/campaign', 'FrontController@kitabisa');
// Route::get('/volunteer', 'FrontController@volunteer');
// Route::get('/veterinarian', 'FrontController@veterinarian');
Route::get('/program', 'FrontController@program');
Route::get('/donate', 'FrontController@donate');
Route::get('/profil', 'FrontController@profil');
// Route::get('/adoption', 'FrontController@adoption');
// Route::get('/adoption/{id}', 'FrontController@adoption_detail');

// Avoid error when already logged in
Route::get('dashboard','Admin\DashboardController@index')->middleware('auth');
/* Administrator Route */
Route::group(['prefix' => 'admin'], function () {
    
    Route::get('dashboard','Admin\DashboardController@index')->middleware('auth');
    Route::resource('volunteer', 'Admin\VolunteerController',['except' => 'show']);
    Route::resource('veterinarian', 'Admin\VeterinarianController',['except' => 'show']);
    // Route::get('volunteer/getDataTable', 'Admin\VolunteerController@getDataTable');
    Route::resource('program', 'Admin\ProgramController',['except' => 'show']);
    Route::resource('team', 'Admin\TeamController',['except' => 'show']);
    Route::resource('album', 'Admin\AlbumController',['except' => 'show']);
    Route::resource('gallery', 'Admin\GalleryController',['except' => 'show']);
    Route::resource('event', 'Admin\EventController',['except' => 'show']);
    Route::resource('slide', 'Admin\SlideController',['except' => 'show']);
    Route::resource('content', 'Admin\ContentController',['except' => 'show']);
    
    // User Management
    Route::get('/user','Admin\UserController@index');
    Route::get('/user/{user}/edit','Admin\UserController@edit');
    Route::put('/user/{user}','Admin\UserController@update');
    Route::delete('/user/{user}','Admin\UserController@destroy');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/admin','Admin\DashboardController@index');