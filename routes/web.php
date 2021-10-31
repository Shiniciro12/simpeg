<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\PendidikanController;

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

//DIKLAT
Route::get('/diklat', [DiklatController::class, 'index']);
Route::get('/diklat/add', [DiklatController::class, 'addForm']);
Route::get('/diklat/update/{diklat_id}', [DiklatController::class, 'updateForm']);

Route::post('/diklat/add', [DiklatController::class, 'add']);
Route::post('/diklat/updt', [DiklatController::class, 'update']);
Route::post('/diklat/delete', [DiklatController::class, 'delete']);

//PENDIDIKAN
Route::get('/pendidikan', [PendidikanController::class, 'index']);
Route::get('/pendidikan/add', [PendidikanController::class, 'addForm']);
Route::get('/pendidikan/update/{pendidikan_id}', [PendidikanController::class, 'updateForm']);

Route::post('/pendidikan/add', [PendidikanController::class, 'add']);
Route::post('/pendidikan/updt', [PendidikanController::class, 'update']);
Route::post('/pendidikan/delete', [PendidikanController::class, 'delete']);
