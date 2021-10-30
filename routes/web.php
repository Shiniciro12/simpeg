<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\riwayatJabatanController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/indexdua', [HomeController::class, 'index2']);

Route::get('/identitas', [IdentitasController::class, 'index']);
Route::get('/identitas/add', [IdentitasController::class, 'addForm']);
Route::get('/identitas/update/{identitas_id}', [IdentitasController::class, 'updateForm']);

Route::post('/identitas/add', [IdentitasController::class, 'add']);
Route::post('/identitas/update', [IdentitasController::class, 'update']);
Route::post('/identitas/delete', [IdentitasController::class, 'delete']);

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/add', [JabatanController::class, 'addForm']);
Route::get('/jabatan/update/{jabatan_id}', [JabatanController::class, 'updateForm']);

Route::post('/jabatan/add', [JabatanController::class, 'add']);
Route::post('/jabatan/updt', [JabatanController::class, 'update']);
Route::post('/jabatan/delete', [JabatanController::class, 'delete']);

//Riwayat Jabatan
Route::get('/riwayat-jabatan', [riwayatJabatanController::class, 'index']);
Route::get('/riwayat-jabatan/add', [riwayatJabatanController::class, 'addForm']);
Route::get('/riwayat-jabatan/update/{riwayat_jabatan_id}', [riwayatJabatanController::class, 'updateForm']);

Route::post('/riwayat-jabatan/add', [riwayatJabatanController::class, 'add']);
Route::post('/riwayat-jabatan/updt', [riwayatJabatanController::class, 'update']);
Route::post('/riwayat-jabatan/delete', [riwayatJabatanController::class, 'delete']);
