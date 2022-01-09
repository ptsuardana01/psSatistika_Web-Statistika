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

Route::get('/', [AppController::class, 'index'])
    ->name('kumpulanData');

Route::get('/tabel-frekuensi', [AppController::class, 'tabelFrekuensi'])
    ->name('tabelFrekuensi');

Route::get('/data-bergolong', [AppController::class, 'dataBergolong'])
    ->name('dataBergolong');

Route::get('chi-kuadrat', [AppController::class, 'chiKuadrat'])
    ->name('chiKuadrat');

Route::get('lilliefors', [AppController::class, 'lilliefors'])
    ->name('lilliefors');

Route::get('ujiT', [AppController::class, 'ujiT'])
    ->name('ujiT');

Route::get('anava', [AppController::class, 'anava'])
    ->name('anava');

Route::get('/tambah-data', [AppController::class, 'formTambahData'])
    ->name('tambahData');
Route::post('/tambah-data', [AppController::class, 'add'])
    ->name('tambahData');

Route::get('/update-data/{id}', [AppController::class, 'formUpdate'])
    ->name('updateData');
Route::put('/update-data/{id}', [AppController::class, 'update'])
    ->name('updateData');

Route::delete('/delete/{id}', [AppController::class, 'destroy'])
    ->name('deletedData');


Route::get('export-data', [AppController::class, 'dataExport'])
    ->name('export-data');

Route::post('import-skor', [AppController::class, 'skorImport'])
    ->name('import-skor');
