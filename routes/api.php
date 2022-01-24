<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('updateled','ApiController@updateled');

Route::post('updatepump','ApiController@updatepump');

Route::get('getcontrols','ApiController@getcontrols');

Route::post('savevalues','ApiController@savevalues');

Route::post('savelogs','ApiController@savelogs');

Route::get('gettemperature','ApiController@gettemperature');

Route::get('getsoil','ApiController@getsoil');

Route::get('gethumidity','ApiController@gethumidity');

Route::get('getrain','ApiController@getrain');

Route::get('getsunlight','ApiController@getsunlight');

Route::get('getallsensors','ApiController@getallsensors');

Route::get('gettemperature','ApiController@gettemperature');

Route::get('getallstages','ApiController@getallstages');

Route::post('login','ApiController@login');

Route::post('setfarmingdate','ApiController@setfarmingdate');

Route::get('taskpage','ApiController@taskpage');

Route::get('homepage','ApiController@homepage');

Route::get('datepage','ApiController@datepage');

Route::post('profilepage','ApiController@profilepage');
