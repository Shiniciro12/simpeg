<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\RiwayatJabatanController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\RiwayatPangkatController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\TandaJasaController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\KlienController;

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

Route::resource('/identitas', IdentitasController::class);

Route::resource('/unit-kerja', UnitKerjaController::class);

Route::resource('/kelurahan', KelurahanController::class);

Route::resource('/kecamatan', KecamatanController::class);

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/add', [JabatanController::class, 'addForm']);
Route::get('/jabatan/update/{jabatan_id}', [JabatanController::class, 'updateForm']);

Route::post('/jabatan/add', [JabatanController::class, 'add']);
Route::post('/jabatan/updt', [JabatanController::class, 'update']);
Route::post('/jabatan/delete', [JabatanController::class, 'delete']);

//Riwayat Jabatan
Route::get('/riwayat-jabatan', [RiwayatJabatanController::class, 'index']);
Route::get('/riwayat-jabatan/add', [RiwayatJabatanController::class, 'addForm']);
Route::get('/riwayat-jabatan/update/{riwayat_jabatan_id}', [RiwayatJabatanController::class, 'updateForm']);

Route::post('/riwayat-jabatan/add', [RiwayatJabatanController::class, 'add']);
Route::post('/riwayat-jabatan/updt', [RiwayatJabatanController::class, 'update']);
Route::post('/riwayat-jabatan/delete', [RiwayatJabatanController::class, 'delete']);

//Pangkat
Route::get('/pangkat', [PangkatController::class, 'index3']);
Route::get('/pangkat/add', [PangkatController::class, 'addForm3']);
Route::get('/pangkat/update/{pangkat_id}', [PangkatController::class, 'updateForm3']);

Route::post('/pangkat/delete', [PangkatController::class, 'delete']);
Route::post('/pangkat/add', [PangkatController::class, 'add3']);
Route::post('/pangkat/update', [PangkatController::class, 'update']);

//Riwayat Pangkat
Route::get('/riwayatpangkat', [RiwayatPangkatController::class, 'index4']);
Route::get('/riwayatpangkat/add', [RiwayatPangkatController::class, 'addForm4']);
Route::get('/riwayatpangkat/update/{riwayat_pangkat_id}', [RiwayatPangkatController::class, 'updateForm4']);

Route::post('/riwayatpangkat/add', [RiwayatPangkatController::class, 'add4']);
Route::post('/riwayatpangkat/update', [RiwayatPangkatController::class, 'update']);
Route::post('/riwayatpangkat/delete', [RiwayatPangkatController::class, 'delete']);

//Diklat
Route::get('/diklat', [DiklatController::class, 'index']);
Route::get('/diklat/add', [DiklatController::class, 'addForm']);
Route::get('/diklat/update/{diklat_id}', [DiklatController::class, 'updateForm']);

Route::post('/diklat/add', [DiklatController::class, 'add']);
Route::post('/diklat/update', [DiklatController::class, 'update']);
Route::post('/diklat/delete', [DiklatController::class, 'delete']);

//Pendidikan
Route::get('/pendidikan', [PendidikanController::class, 'index']);
Route::get('/pendidikan/add', [PendidikanController::class, 'addForm']);
Route::get('/pendidikan/update/{pendidikan_id}', [PendidikanController::class, 'updateForm']);

Route::post('/pendidikan/add', [PendidikanController::class, 'add']);
Route::post('/pendidikan/updt', [PendidikanController::class, 'update']);
Route::post('/pendidikan/delete', [PendidikanController::class, 'delete']);

//Keluarga
Route::get('/keluarga', [KeluargaController::class, 'index']);
Route::get('/keluarga/add', [KeluargaController::class, 'addForm']);
Route::get('/keluarga/update/{keluarga_id}', [KeluargaController::class, 'updateForm']);

Route::post('/keluarga/add', [KeluargaController::class, 'add']);
Route::post('/keluarga/update', [KeluargaController::class, 'update']);
Route::post('/keluarga/delete', [KeluargaController::class, 'delete']);

//Tanda Jasa
Route::get('/tandajasa', [TandaJasaController::class, 'index']);
Route::get('/tandajasa/add', [TandaJasaController::class, 'addForm']);
Route::get('/tandajasa/update/{tanda_jasa_id}', [TandaJasaController::class, 'updateForm']);

Route::post('/tandajasa/add', [TandaJasaController::class, 'add']);
Route::post('/tandajasa/update', [TandaJasaController::class, 'update']);
Route::post('/tandajasa/delete', [TandaJasaController::class, 'delete']);

Route::get('/', [UmumController::class, 'index']);

//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'signIn']);

//Access By Role
//root, bkppd, unit-kerja
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [RootController::class, 'index']);
    Route::group(['prefix' => 'unit-kerja'], function () {
        Route::get('/pengajuan', [UnitKerjaController::class, 'pengajuan']);
        Route::post('/pengajuan', [UnitKerjaController::class, 'verifikasi']);
        Route::post('/identitas', [UnitKerjaController::class, 'getIdentitas']);
        Route::post('/buat/layanan', [UnitKerjaController::class, 'requestLayanan']);
    });
});

//client
Route::group(['prefix' => 'klien'], function () {
    Route::get('/dashboard', [KlienController::class, 'dashboard']);
    Route::get('/dataumum', [KlienController::class, 'dataUmum']);
    Route::get('/datakhusus', [KlienController::class, 'dataKhusus']);
    Route::get('/layanan/layanankhusus', [KlienController::class, 'dataKhususLayanan']);
    Route::get('/layanan/index2', [KlienController::class, 'indexLayanan2']);
    Route::get('/layanan/satyalencana', [KlienController::class, 'satyaLencanaForm']);
    Route::get('/layanan/form2', [KlienController::class, 'indexLayananForm2']);
    Route::get('/layanan/listsurat', [KlienController::class, 'indexListSurat']);

    Route::post('/layanan/satyaadd', [KlienController::class, 'satyaLencanaAdd']);
});
