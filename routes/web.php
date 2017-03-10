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
Route::get('api/v1/type=categories_add&cat_name={cat_name}&author_id={author_name}', 'QueryController@categoriesInsert');


/*
group routing for making categories Api
*/


Route::group(['prefix' => 'api/v1/type=categories'], function () {
    Route::get('event=listing', 'categoriesController@categoriesList');
    Route::get('event=add&cat_name={cat_name}&author_id={author_name}','categoriesController@categoriesInsert');
    Route::get('event=showByAuthor&author_id={author_id}','categoriesController@showCategoriesListByAuthor');
    Route::get('event=updateByAuthor&cat_id={cat_id}&cat_changes={cat_changes}','categoriesController@updateCategoriesList');
    Route::get('event=deleteById&cat_id={cat_id}','categoriesController@deleteCategoriesItem');
    
});