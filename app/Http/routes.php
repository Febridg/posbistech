<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'viewhome@home');
//Route::get('/tes', 'viewhome@tes');
//login
Route::post('/proses/login','aksilogin@login');

//modul
Route::get('/modul', 'viewmodul@listmodul');
Route::get('/modul/tambahmodul', 'viewmodul@tambahmodul');
Route::get('/modul/tambahdetailmodul', 'viewmodul@tambahdetailmodul');
Route::post('/modul/aksitambahmodul', 'viewmodul@aksitambahmodul');
Route::post('/modul/aksitambahdetailmodul', 'viewmodul@aksitambahdetailmodul');
Route::get('/modul/editmodul/{id}','viewmodul@editmodul');
Route::post('/modul/aksieditmodul/{id}', 'viewmodul@aksieditmodul');
Route::get('/modul/editdetailmodul/{id}','viewmodul@editdetailmodul');
Route::post('/modul/aksieditdetailmodul/{id}', 'viewmodul@aksieditdetailmodul');
Route::get('/modul/deletemodul/{id}', 'viewmodul@deletemodul');
Route::get('/modul/deletedetailmodul/{id}', 'viewmodul@deletedetailmodul');

//otoritas
Route::get('/otoritas', 'viewotoritas@listotoritas');
Route::get('/otoritas/tambahotoritas', 'viewotoritas@tambahotoritas');
Route::post('/otoritas/aksitambahotoritas', 'viewotoritas@aksitambahotoritas');
Route::get('/otoritas/editotoritas/{id}','viewotoritas@editotoritas');
Route::post('/otoritas/aksieditotoritas/{id}', 'viewotoritas@aksieditotoritas');
Route::get('/otoritas/tambahdetailotoritas', 'viewotoritas@tambahdetailotoritas');
Route::get('/otoritas/menutambahdetailotoritas/{id}', 'viewotoritas@menutambahdetailotoritas');
Route::post('/otoritas/aksitambahdetailotoritas', 'viewotoritas@aksitambahdetailotoritas');
Route::get('/otoritas/editdetailotoritas/{id}','viewotoritas@editdetailotoritas');
Route::post('/otoritas/aksieditdetailotoritas/{id}', 'viewotoritas@aksieditdetailotoritas');
Route::get('/otoritas/deleteotoritas/{id}', 'viewotoritas@deleteotoritas');
Route::get('/otoritas/deletedetailotoritas/{id}', 'viewotoritas@deletedetailotoritas');

//kategori produk
Route::get('/kategoriproduk', 'viewkategoriproduk@listkategoriproduk');
Route::get('/kategoriproduk/tambahkategoriproduk', 'viewkategoriproduk@tambahkategoriproduk');
Route::post('/kategoriproduk/aksitambahkategoriproduk', 'viewkategoriproduk@aksitambahkategoriproduk');
Route::get('/kategoriproduk/editkategoriproduk/{id}','viewkategoriproduk@editkategoriproduk');
Route::post('/kategoriproduk/aksieditkategoriproduk/{id}', 'viewkategoriproduk@aksieditkategoriproduk');
Route::get('/kategoriproduk/deletekategoriproduk/{id}', 'viewkategoriproduk@deletekategoriproduk');

//produk
Route::get('/produk', 'viewproduk@listproduk');
Route::get('/produk/tambahproduk', 'viewproduk@tambahproduk');
Route::post('/produk/aksitambahproduk', 'viewproduk@aksitambahproduk');
Route::get('/produk/editproduk/{id}','viewproduk@editproduk');
Route::post('/produk/aksieditproduk/{id}', 'viewproduk@aksieditproduk');
Route::get('/produk/deleteproduk/{id}', 'viewproduk@deleteproduk');

//pengiriman
Route::get('/pengiriman', 'viewpengiriman@listpengiriman');

Route::auth();
