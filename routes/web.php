<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\TandaJasaController;

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

Route::get('/keluarga', [KeluargaController::class, 'index']);
Route::get('/keluarga/add', [KeluargaController::class, 'addForm']);
Route::get('/keluarga/update/{keluarga_id}', [KeluargaController::class, 'updateForm']);

Route::post('/keluarga/add', [KeluargaController::class, 'add']);
Route::post('/keluarga/update', [KeluargaController::class, 'update']);
Route::post('/keluarga/delete', [KeluargaController::class, 'delete']);


Route::get('/tandajasa', [TandaJasaController::class, 'index']);
Route::get('/tandajasa/add', [TandaJasaController::class, 'addForm']);
Route::get('/tandajasa/update/{tanda_jasa_id}', [TandaJasaController::class, 'updateForm']);

Route::post('/tandajasa/add', [TandaJasaController::class, 'add']);
Route::post('/tandajasa/update', [TandaJasaController::class, 'update']);
Route::post('/tandajasa/delete', [TandaJasaController::class, 'delete']);