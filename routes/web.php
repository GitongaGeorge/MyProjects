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
    return view('signup');
})->name('signup');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/dash','DashboardController@index')->name('dash');

Route::get('/history','DashboardController@history')->name('history');

Route::get('/task','DashboardController@task')->name('task');

Route::get('/farming','DashboardController@farming')->name('farming');

Route::get('taskdone/{id}','UserController@taskdone');

Route::post('getsunlight','DashboardController@getsunlight');

Route::post('savedates','DashboardController@savedates');

Route::post('saveuser','UserController@signup');

Route::post('loginuser','UserController@login');

Route::get('logout','UserController@logout');

Route::post('savetask','UserController@savetask');

Route::get('/reportpdf','DashboardController@reportpdf');

Route::get('/report','DashboardController@report');
