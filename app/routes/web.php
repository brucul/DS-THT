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
	if (Auth::check()) {
		if (Auth::user()->is_admin == 1) {
			return redirect()->route('admin.home');
		}else{
			return redirect()->route('home');
		}
	}else{
		return view('welcome');
	}
	
});

Auth::routes();
Auth::routes(['verify' => true]);

//Route::post('trial', 'HomeController@trial')->name('trial');
Route::get('register/{token}','Auth\RegisterController@activating')->name('activating-account');

Route::group(['middleware' => ['verified', 'is_user']], function () {
	Route::get('home', 'UserController@info')->name('home');
	Route::get('home/info-penyakit/{id}', 'UserController@showInfo')->name('show');
	Route::get('riwayat-diagnosa/{id}', 'UserController@riwayatDiagnosa')->name('riwayat');
	Route::get('riwayat-diagnosa/detail/{id}', 'UserController@detailRiwayat')->name('detail-riwayat');
	Route::get('riwayat-diagnosa/cetak-riwayat/{id}', 'UserController@riwayatPDF')->name('cetak-riwayat');
	Route::get('pegawai/cetak_pdf', 'PegawaiController@cetak_pdf');
	Route::get('diagnosis/{id}', 'UserController@diagnosa')->name('diagnosa');
	Route::post('diagnosis/hasil-diagnosis', 'DSController@diagnosis')->name('hasil-diagnosis');
	//Route::post('diagnosis/hasil-diagnosis/{id}/gejala', 'DSController@show')->name('gejala-diagnosis');
	Route::get('profil/{id}', 'UserController@profil')->name('profil');
	Route::post('profil/update-profil', 'UserController@update_profil')->name('update.profil');
	Route::post('profil/update-pass', 'UserController@update_pass')->name('update.pass');
	Route::group(['prefix' => 'info-penyakit', 'as' => 'info.'], function(){
		Route::get('/', 'UserController@info')->name('home');
		
	});
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
	Route::get('riwayat-diagnosa/cetak-riwayat', 'PasienController@riwayatPDF')->name('cetak-riwayat');
	
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
	Route::get('users-account/destroy/{id}', 'UserController@destroy')->name('users.delete');
});