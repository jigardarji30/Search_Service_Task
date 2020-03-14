<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','CategoryController@index');
Route::get('/add_category','CategoryController@addCategory');
Route::get('/filterService','CategoryController@filterService');
Route::post('/category/store','CategoryController@storeCategory');
Route::get('/add_sub_category','CategoryController@addSubCategory');
Route::post('/subcategory/store','CategoryController@storeSubCategory');
Route::get('/getSubCategory/{id}','CategoryController@getSubCategoryBasedOnCategory');

