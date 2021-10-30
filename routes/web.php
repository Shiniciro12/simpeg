<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;

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

Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);
Route::get('/unit-kerja/add', [UnitKerjaController::class, 'addForm']);
Route::get('/unit-kerja/update/{unit_kerja_id}', [UnitKerjaController::class, 'updateForm']);

Route::post('/unit-kerja/add', [UnitKerjaController::class, 'add']);
Route::post('/unit-kerja/update', [UnitKerjaController::class, 'update']);
Route::post('/unit-kerja/delete', [UnitKerjaController::class, 'delete']);

Route::get('/kelurahan', [KelurahanController::class, 'index']);
Route::get('/kelurahan/add', [KelurahanController::class, 'addForm']);
Route::get('/kelurahan/update/{kelurahan_id}', [KelurahanController::class, 'updateForm']);

Route::post('/kelurahan/add', [KelurahanController::class, 'add']);
Route::post('/kelurahan/update', [KelurahanController::class, 'update']);
Route::post('/kelurahan/delete', [KelurahanController::class, 'delete']);

Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kecamatan/add', [KecamatanController::class, 'addForm']);
Route::get('/kecamatan/update/{kelurahan_id}', [KecamatanController::class, 'updateForm']);

Route::post('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/update', [KecamatanController::class, 'update']);
Route::post('/kecamatan/delete', [KecamatanController::class, 'delete']);