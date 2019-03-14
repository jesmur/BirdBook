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


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'PostController@index');

Route::get('/home', 'PostController@index');

Route::get('/posts/poll', 'PostController@poll');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts/store', 'PostController@store');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/{post}/addFav', 'PostController@addFavourite');

Route::post('/{post}/unFav', 'PostController@removeFavourite');

Route::get('/{user}/favourites', 'UserController@userFavourites');

Route::get('/{user}/posts', 'UserController@show');


Route::delete('admin/posts/{post}/destroy', 'PostController@destroy')->middleware('role:2');

Route::get('/admin/users', 'UserController@index');

Route::any( '/admin/users/search', 'UserController@search' );

Route::get('/admin/users/{user}/edit', 'UserController@edit');

Route::get('/admin/users/{user}/destroy', 'UserController@destroy');

Route::patch('/admin/users/{user}', 'UserController@update');


Route::post('/admin/themes/store', 'ThemeController@store');

Route::get('/admin/themes/create', 'ThemeController@create');

Route::get('/admin/themes/{theme}/edit', 'ThemeController@edit');

Route::delete('/admin/themes/{theme}/destroy', 'ThemeController@destroy');

Route::patch('/admin/themes/{theme}', 'ThemeController@update');

Route::get('/admin/themes', 'ThemeController@index');

Route::post('/setTheme', 'ThemeController@setTheme');


//DB_CONNECTION=sqlite
//DB_HOST=127.0.0.1
//DB_PORT=3306
//DB_DATABASE=/home/NSCCStudent/PhpstormProjects/Murray-Jessica-w0273960/Assignments/FinalProject/database/FinalProjectDB_lite.sqlite
//DB_USERNAME=null
//DB_PASSWORD=null

//DB_CONNECTION=mysql
//DB_HOST=127.0.0.1
//DB_PORT=3306
//DB_DATABASE=FinalProjectDB
//DB_USERNAME=finalWeb
//DB_PASSWORD=password





