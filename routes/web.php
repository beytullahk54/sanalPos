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

use App\Http\Middleware\Profil;
Auth::routes();

Route::get('/',  array('as'=>'home','uses'=>'HomeController@index'));

Route::get('/panel',  array('as'=>'admin.panel','uses'=>'AdminController@index'));

Route::get('/panel/education/create',  array('as'=>'admin.education.create','uses'=>'AdminController@create'));
Route::post('/panel/education/createPost',  array('as'=>'admin.education.createPost','uses'=>'AdminController@createPost'));
Route::get('/panel/education/edit/{id?}',  array('as'=>'admin.education.edit','uses'=>'AdminController@edit'));
Route::get('/panel/education/update/{id?}',  array('as'=>'admin.education.update','uses'=>'AdminController@update'));
Route::get('/panel/education/delete/{id?}',  array('as'=>'admin.education.delete','uses'=>'AdminController@delete'));



Route::group(array('before'=>'auth'),function(){
	Route::post('password/reset/3', 'Auth\ForgotPasswordController@showLinkRequestForm3')->name('password.request3');
	Route::post('password/reset/2', 'Auth\ForgotPasswordController@showLinkRequestForm2')->name('password.request2');
});

Route::get('/odeme/{id}',  array('uses'=>'HomeController@odeme'));
Route::post('/odemeSonuc',  array('uses'=>'HomeController@odemeSonuc'));
