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
//Auth::routes();
Route::get('/login','AdminController@getLogin')->name('login');
Route::get('/signup','AdminController@getSignup')->name('signup');
Route::post('/signup','AdminController@postSignup')->name('postSignup');
Route::post('/login','AdminController@postLogin')->name('postLogin');
Route::get('/logout','AdminController@adminLogout')->name('logout');
Route::get('/admin/list','AdminController@list')->name('list')->middleware('checkAuth');
Route::get('/admin/{id}/view', 'AdminController@view')->name('view')->middleware('checkAuth');;
Route::get('/admin/edit/{id}', 'AdminController@edit')->name('edit')->middleware('checkAuth');;
Route::get('/admin/delete/{id}', 'AdminController@delete')->name('delete')->middleware('checkAuth');;
Route::post('/admin/update/{id}', 'AdminController@update')->name('update')->middleware('checkAuth');;

