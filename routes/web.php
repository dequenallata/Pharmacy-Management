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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addProduct',['as'=>'_addProduct','uses'=>'HomeController@addProducts']);

Route::get('/profile/{id}',['as'=>'profile','uses'=>'HomeController@userProfile']);

Route::post('/addProduct',['as'=>'add.product','uses'=>'HomeController@createProduct']);

Route::post('/purchase_list',['as'=>'create.temp.list','uses'=>'HomeController@createTempList']);

Route::post('/delete_list_all',['as'=>'delete.list.all','uses'=>'HomeController@deleteListAll']);

Route::post('/delete_list',['as'=>'delete.list','uses'=>'HomeController@deleteList']);

Route::post('/updateing_profile',['as'=>'update.profile','uses'=>'HomeController@updateProfile']);

Route::post('/save_memo',['as'=>'save.memo','uses'=>'HomeController@saveMemos']);

Route::get('/edit_medicine_info/{id}',['as'=>'edit.medicine', 'uses'=>'ShowController@editMedicine']);

Route::post('/update_medicine_info',['as'=>'update', 'uses'=>'ShowController@updateMedicine']);

Route::post('/delete_medicine_info',[ 'as'=>'delete.medicine', 'uses'=>'ShowController@deleteMedicine']);

Route::get('/list_of_products',[ 'as'=>'show.medicine', 'uses'=>'ShowController@showMedicine']);

Route::get('/purchase_list',[ 'as'=>'purchase.list', 'uses'=>'HomeController@tempPurchaseList']);

Route::get('/create_a_memo',[ 'as'=>'create.memo', 'uses'=>'HomeController@createMemo']);

Route::get('/show_history',[ 'as'=>'show.memo', 'uses'=>'HomeController@showMemos']);