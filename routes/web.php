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
    return view('admin.kumpulanData');
})->name('kumpulanData');

Route::get('/tabel-frekuensi', function () {
    return view('admin.tabelFrekuensi');
})->name('tabelFrekuensi');

Route::get('/data-bergolong', function () {
    return view('admin.dataBergolong');
})->name('dataBergolong');