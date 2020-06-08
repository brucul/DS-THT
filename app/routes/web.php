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

Route::get('trial/{id}', 'HomeController@trial');

Route::get('home', 'HomeController@index')->name('home');
Route::get('riwayat-diagnosa/{id}', 'UserController@riwayatDiagnosa')->name('riwayat');
Route::get('diagnosis', 'UserController@diagnosa')->name('diagnosa');
Route::post('diagnosis/hasil-diagnosis', 'DSController@diagnosis')->name('hasil-diagnosis');
//Route::post('diagnosis/hasil-diagnosis/{id}/gejala', 'DSController@show')->name('gejala-diagnosis');
Route::get('profil/{id}', 'UserController@profil')->name('profil');
Route::post('profil/update-profil', 'UserController@update_profil')->name('update.profil');
Route::post('profil/update-pass', 'UserController@update_pass')->name('update.pass');
Route::group(['prefix' => 'info-penyakit', 'as' => 'info.'], function(){
	Route::get('/', 'UserController@info')->name('home');
	Route::get('/detail/{id}', 'UserController@showInfo')->name('show');
});


Route::group(['prefix' => 'admin', 'middleware' => 'is_admin', 'as' => 'admin.'], function() {
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@adminHome']);
	
	//gejala
	Route::get('data-gejala', 'GejalaController@index')->name('gejala');
	Route::post('data-gejala/store', 'GejalaController@store')->name('gejala.store');
	Route::get('data-gejala/{id}/edit', 'GejalaController@edit')->name('gejala.edit');
	Route::post('data-gejala/update', 'GejalaController@update')->name('gejala.update');
	Route::get('data-gejala/destroy/{id}', 'GejalaController@destroy')->name('gejala.delete');
	
	//penyakit
	Route::get('data-penyakit', 'PenyakitController@index')->name('penyakit');
	Route::post('data-penyakit/store', 'PenyakitController@store')->name('penyakit.store');
	Route::get('data-penyakit/{id}/edit', 'PenyakitController@edit')->name('penyakit.edit');
	Route::post('data-penyakit/update', 'PenyakitController@update')->name('penyakit.update');
	Route::get('data-penyakit/destroy/{id}', 'PenyakitController@destroy')->name('penyakit.delete');
	
	Route::get('info-penyakit', 'InfoPenyakitController@index')->name('info.list');
	Route::get('info-penyakit/edit/{kode}', 'InfoPenyakitController@edit');
	Route::post('info-penyakit/store', 'InfoPenyakitController@update')->name('info.store');
	
	//pasien
	Route::get('data-pasien', 'PasienController@index')->name('pasien');
	Route::get('data-pasien/{id}/edit', 'PasienController@edit')->name('pasien.edit');
	Route::post('data-pasien/update', 'PasienController@update')->name('pasien.update');
	Route::get('data-pasien/destroy/{id}', 'PasienController@destroy')->name('pasien.delete');
	
	//DS
	Route::get('ds-rules', 'DSController@index')->name('ds-rules');
	Route::post('ds-rules/store', 'DSController@store')->name('ds-rules.store');
	Route::get('ds-rules/{id}/edit', 'DSController@edit')->name('ds-rules.edit');
	Route::post('ds-rules/update', 'DSController@update')->name('ds-rules.update');
	Route::get('ds-rules/destroy/{id}', 'DSController@destroy')->name('ds-rules.delete');

	//FC
	Route::get('fc-rules', 'FCController@index')->name('fc-rules');
	Route::get('fc-rules/{id}/tambah-rule', 'FCController@edit')->name('tambah-fc-rules');
	Route::post('fc-rules/update', 'FCController@update')->name('fc-rules.update');

	//users
	Route::get('users-account', 'UserController@index')->name('users.account');
	Route::get('users-account/edit/{id}', 'UserController@edit')->name('users.account.edit');
	Route::post('users-account/update-profil', 'UserController@update_profil')->name('update.profil');
	Route::post('users-account/update-pass', 'UserController@update_pass_admin')->name('update.pass');
});