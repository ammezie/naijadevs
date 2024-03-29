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

Route::get('/about', 'PagesController@about');
Route::get('/pricing', 'PagesController@pricing');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/terms', 'PagesController@terms');
Route::get('/faqs', 'PagesController@faqs');

// Jobs
Route::get('/', 'JobsController@index')->name('home');
Route::get('/jobs', 'JobsController@index');
Route::get('/post-job', 'JobsController@create')->name('post_job');
Route::post('/jobs', 'JobsController@store');
Route::get('/jobs/{job}/edit', 'JobsController@edit');
Route::patch('/jobs/{job}', 'JobsController@update');
Route::patch('/jobs/{job}/close', 'JobsController@close')->name('close_job');
Route::get('/jobs/{job}/{title?}', 'JobsController@show');
Route::get('/filters', 'JobsController@filterJobs');

// Companies
Route::get('/companies/{company}', 'CompaniesController@show');

// Newsletter
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

// Admin-ish
Route::prefix('azu')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('/users', 'UsersController', ['except' => ['show']]);
        Route::get('/jobs', 'JobsController@index')->name('jobs.index');
        Route::resource('categories', 'JobCategoriesController', ['except' => ['show']]);
        Route::resource('types', 'JobTypesController', ['except' => ['show']]);
    });
