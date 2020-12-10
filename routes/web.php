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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:admin']],function(){
    Route::get('/karyawan', 'App\Http\Controllers\KaryawanController@index');
    Route::post('/karyawan/create', 'App\Http\Controllers\KaryawanController@create');
    Route::post('/karyawan/{id}/update', 'App\Http\Controllers\KaryawanController@update');
    Route::get('/karyawan/{id}/delete', 'App\Http\Controllers\KaryawanController@delete');
});

Route::group(['middleware' => ['auth','checkRole:admin,karyawan']],function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::get('/data', 'App\Http\Controllers\DataController@index');
    Route::get('/karyawan/{id}/edit', 'App\Http\Controllers\KaryawanController@edit');
    Route::get('/karyawan/{id}/profile', 'App\Http\Controllers\KaryawanController@profile');
});  
