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

Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');


Route::get('/', function () {
    return view('welcome');
});


Route::get('insert', 'QueryController@insertNew');
Route::get('alldata', 'QueryController@allData');
Route::get('wheredata', 'QueryController@whereData');