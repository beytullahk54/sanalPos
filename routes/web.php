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

Route::get('/',  array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/panel',  array('as' => 'admin.panel', 'uses' => 'AdminController@index'));

//İyzico Eklemesi
Route::get('/iyzico-panel', array('as' => 'admin.iyzipanel', 'uses' => 'AdminController@iyzico'));
//İyzico Eklemesi

Route::get('/panel/education/create',  array('as' => 'admin.education.create', 'uses' => 'AdminController@create'));

//İyzico Eklemesi
Route::get('/panel/education/create-iyzico',  array('as' => 'admin.education.create-iyzico', 'uses' => 'AdminController@createIyzico'));
//İyzico Eklemesi

Route::post('/panel/education/createPost',  array('as' => 'admin.education.createPost', 'uses' => 'AdminController@createPost'));

//iyzico 
Route::post('/panel/education/createPostiyzico',  array('as' => 'admin.education.createPostiyzico', 'uses' => 'AdminController@createPostiyzico'));
Route::post('/panel/education/iyziOdeme',  array('as' => 'admin.education.iyziOdeme', 'uses' => 'HomeController@iyziOdeme'));
Route::get('/iyzico/{id}',  array('uses' => 'HomeController@iyzico'));
//iyzico

Route::get('/panel/education/edit/{id?}',  array('as' => 'admin.education.edit', 'uses' => 'AdminController@edit'));
Route::post('/panel/education/update/{id?}',  array('as' => 'admin.education.update', 'uses' => 'AdminController@update'));
Route::get('/panel/education/delete/{id?}',  array('as' => 'admin.education.delete', 'uses' => 'AdminController@delete'));



Route::group(array('before' => 'auth'), function () {
	Route::post('password/reset/3', 'Auth\ForgotPasswordController@showLinkRequestForm3')->name('password.request3');
	Route::post('password/reset/2', 'Auth\ForgotPasswordController@showLinkRequestForm2')->name('password.request2');
});


Route::post('/base64hash', array('as' => 'home.base64hash', 'uses' => 'HomeController@base64hash'));
Route::post('/indirimSorgula', array('as' => 'home.indirimSorgula', 'uses' => 'HomeController@indirimSorgula'));
Route::post('/base64hash2', array('as' => 'home.base64hash2', 'uses' => 'HomeController@base64hash2'));
Route::get('/egitimlerApi/{paket?}', array('as' => 'home.egitimlerApi', 'uses' => 'HomeController@egitimlerApi'));
Route::get('/egitimler/{paket?}', array('as' => 'home.egitimler', 'uses' => 'HomeController@egitimler'));
Route::get('/odeme/{id}',  array('uses' => 'HomeController@odeme'));
Route::post('/odemeSonuc',  array('uses' => 'HomeController@odemeSonuc'));
