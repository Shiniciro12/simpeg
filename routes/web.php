<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\RiwayatPangkatController;

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

Route::get('/pangkat', [PangkatController::class, 'index3']);
Route::get('/pangkat/add', [PangkatController::class, 'addForm3']);
Route::get('/pangkat/update/{pangkat_id}', [PangkatController::class, 'updateForm3']);

Route::post('/pangkat/delete', [PangkatController::class, 'delete']);
Route::post('/pangkat/add', [PangkatController::class, 'add3']);
Route::post('/pangkat/update', [PangkatController::class, 'update']);

Route::get('/riwayatpangkat', [RiwayatPangkatController::class, 'index4']);
Route::get('/riwayatpangkat/add', [RiwayatPangkatController::class, 'addForm4']);
Route::get('/riwayatpangkat/update/{riwayat_pangkat_id}', [RiwayatPangkatController::class, 'updateForm4']);

Route::post('/riwayatpangkat/add', [RiwayatPangkatController::class, 'add4']);
Route::post('/riwayatpangkat/update', [RiwayatPangkatController::class, 'update']);
Route::post('/riwayatpangkat/delete', [RiwayatPangkatController::class, 'delete']);