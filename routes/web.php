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

Route::get('/', 'PatientsController@index');
Route::get('/patients/add/init', 'PatientsController@createInit');
Route::post('/patients/add/init', 'PatientsController@storeInit');
Route::get('/patients/{id}/add/main', 'PatientsController@createMain');
Route::post('/patients/{id}/add/main', 'PatientsController@storeMain');
Route::get('/patients/crud', 'PatientsController@index');
Route::get('/categories/blue', 'PatientsController@indexBlue');
Route::get('/categories/red', 'PatientsController@indexRed');
Route::get('/categories/yellow', 'PatientsController@indexYellow');
Route::get('/categories/green', 'PatientsController@indexGreen');
Route::post('/patients/{id}/add/main', 'PatientsController@storeMain');
//Route::get('/patients/{id}/destroy', 'PatientsController@destroy');
Route::get('/patients/recreate/79vonc8b6evwus8cbtoh0nj2s4c7tnrdpvjds', 'PatientsController@recreate');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');