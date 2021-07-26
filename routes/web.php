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

Route::get('/', 'AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' =>'auth'],function(){
    Route::get('/home','posyanduController@showData');

    Route::get('/tambahpertemuan','pertemuanController@add');
    Route::post('/simpanpertemuan','pertemuanController@proses');
    Route::get('/editpertemuan/{id}','pertemuanController@edit');
    Route::patch('/simpaneditpertemuan/{id}','pertemuanController@editproses');
    
    Route::get('/rekam','rekamController@tampilData');
    
    Route::get('/lihatpasien/{id}','pasienController@tampilData');
    Route::get('/tambahpasien','pasienController@add');
    Route::post('/simpanpasien','pasienController@proses');
    Route::get('/editpasien/{id}','pasienController@edit');
    Route::patch('/simpaneditpasien/{id}','pasienController@editproses');
    Route::delete('/hapuspasien/{id}','pasienController@delete');
    Route::get('/riwayatpasien/{id}','pasienController@riwayat');
    
    Route::get('/lihatkehadiran/{id}','kehadiranController@tampilData');
    Route::get('/tambahkehadiran','kehadiranController@add');
    Route::post('/simpankehadiran','kehadiranController@proses');
    Route::get('/editkehadiran/{id}','kehadiranController@edit');
    Route::patch('/simpaneditkehadiran/{id}','kehadiranController@editproses');
    Route::delete('/hapuskehadiran/{id}','kehadiranController@delete');
   
    Route::get('/hasil','perhitunganController@tampilData');
    Route::get('/lihatperhitungan/{id}','perhitunganController@tampilHitung');

    Route::get('/variabel','variabelController@tampilData');

    Route::get('/tambahvariabel','variabelController@add');
    Route::post('/simpanvariabel','variabelController@proses');
    Route::get('/editvariabel/{id}','variabelController@edit');
    Route::patch('/simpaneditvariabel/{id}','variabelController@editproses');
    Route::delete('/hapusvariabel/{id}','variabelController@delete');

    
    Route::get('/tambahvariabelset','variabelController@addset');
    Route::post('/simpanvariabelset','variabelController@prosesset');
    Route::get('/editvariabelset/{id}','variabelController@editset');
    Route::patch('/simpaneditvariabelset/{id}','variabelController@editprosesset');
    Route::delete('/hapusvariabelset/{id}','variabelController@deleteset');
});