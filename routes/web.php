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

route::post('store-file','FileUploadController@saveFile');

route::get('home','FileUploadController@Home');
route::get('delete-file/{id}','FileUploadController@deleteFile');