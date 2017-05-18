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

Route::get('/', 'JobsController@index')->name('home');
Route::get('/jobs', 'JobsController@index');
Route::get('/post-job', 'JobsController@create')->name('post_job');
Route::post('/jobs', 'JobsController@store');
Route::get('/jobs/{job}/edit', 'JobsController@edit');
Route::patch('/jobs/{job}', 'JobsController@update');
Route::get('/jobs/{job}/{title?}', 'JobsController@show');

Route::post('/newsletter/job_notify', 'JobNotificationsController@subscribe')->name('job_notify');

// User Account
Route::get('/my-jobs', 'UsersController@myJobs');
Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'UsersController@showAccountEditForm');
    Route::get('/account', 'UsersController@showAccountEditForm');
    Route::patch('/account', 'UsersController@updateAccount')->name('update_account');
    Route::get('/company', 'UsersController@showCompanyEditForm');
    Route::patch('/company', 'UsersController@updateCompany')->name('update_company');
});
