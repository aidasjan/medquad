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

Route::get('/patients/add/init', 'PatientsController@createInit');
Route::post('/patients/add/init', 'PatientsController@storeInit');
Route::get('/patients/{id}/add/main', 'PatientsController@createMain');
Route::post('/patients/{id}/add/main', 'PatientsController@storeMain');