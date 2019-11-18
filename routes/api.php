<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//edit nilai siswa menggunakan ajax
Route::post('siswa/{id}/edit_nilai', 'ApiController@edit_nilai');
//edit semester menggunakan ajax
Route::post('siswa/{id}/edit_semester', 'ApiController@edit_semester');
