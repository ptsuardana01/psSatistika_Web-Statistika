<?php

use App\Http\Controllers\AppController;
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

Route::get('/', [AppController::class, 'index'])->name('kumpulanData');

Route::get('/tabel-frekuensi', [AppController::class, 'tabelFrekuensi'])->name('tabelFrekuensi');

Route::get('/data-bergolong', [AppController::class, 'dataBergolong'])->name('dataBergolong');

Route::get('/tambah-data', [AppController::class, 'formTambahData'])->name('tambahData');
Route::post('/tambah-data', [AppController::class, 'add'])->name('tambahData');

Route::get('/update-data', [AppController::class, 'formUpdate'])->name('updateData');
Route::put('/update-data', [AppController::class, 'update'])->name('updateData');

Route::delete('/delete', [AppController::class, 'destroy'])->name('deletedData');


