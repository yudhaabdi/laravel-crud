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
Route::get('/', 'frontend\SiteController@home');
//regristrasi
Route::get('/register', 'frontend\SiteController@register');
Route::post('/postRegister', 'frontend\SiteController@postRegister');
//halaman login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' =>  ['auth', 'checkRole:admin']], function () {
    //halaman dashboard
    Route::get('/dashboard', 'DashboardController@index');
    //menampilakn data siswa
    Route::get('/siswa/json', 'SiswaController@json');
    Route::get('/siswa', 'SiswaController@index');
    //tambah data siswa
    Route::get('/siswa/dataSiswa', 'SiswaController@dataSiswa');
    Route::post('/siswa/create', 'SiswaController@create');
    //update data siswa
    Route::get('/siswa/edit/{id}', 'SiswaController@edit');
    Route::post('/siswa/update/{id}', 'SiswaController@update');
    //delete
    Route::get('/siswa/delete/{id}', 'SiswaController@delete');
    //menampilkan profil siswa
    Route::get('/siswa/{id}/profile', 'SiswaController@profile');
    //tambah nilai siswa
    Route::post('/siswa/{id}/add_nilai', 'SiswaController@addnilai');
    route::get('/siswa/{id}/{id_mapel}/delete_nilai', 'SiswaController@delete_nilai'); 
    //export siswa
    Route::get('siswa/export_excel', 'SiswaController@exportExcel');
    Route::get('siswa/export_pdf', 'SiswaController@exportPdf');
    //menampilkan guru
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create')->name('guru.create');
    //tambah data guru
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dashboard', 'DashboardController@index');
    //menampilkan guru
    Route::get('/guru', 'GuruController@index');
});


