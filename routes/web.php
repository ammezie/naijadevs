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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs', 'JobsController@index');
Route::get('/post-job', 'JobsController@create')->name('post_job');
Route::post('/jobs', 'JobsController@store');
Route::get('/jobs/{job}', 'JobsController@show');
Route::get('/jobs/{job}/edit', 'JobsController@edit');
Route::patch('/jobs/{job}', 'JobsController@update');
