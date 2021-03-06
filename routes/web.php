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

//Access by role root, bkppd, unit-kerja
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [RootController::class, 'index']);
    Route::group(['prefix' => 'unit-kerja'], function () {
        // Route::get('/pengajuan', [UnitKerjaController::class, 'pengajuanUnitKerja']);
        Route::get('/pegawai/{data}/{dokumen}', [UnitKerjaController::class, 'pegawaiUnitKerja']);
        
        Route::get('/berkas/umum/{param1}/{param2}/{param3}', [UnitKerjaController::class, 'berkasUmumUnitKerja']);
        Route::get('/berkas/khusus/{param1}/{param2}/{param3}', [UnitKerjaController::class, 'berkasKhususUnitKerja']);
        Route::post('/berkas/verifikasi', [UnitKerjaController::class, 'verifikasiUnitKerja']);
    });
    Route::group(['prefix' => 'bkppd'], function () {
        // Route::get('/pengajuan', [UnitKerjaController::class, 'pengajuanBKPPD']);
        Route::get('/pegawai/{data}/{dokumen}', [UnitKerjaController::class, 'pegawaiBKPPD']);
        
        Route::get('/berkas/umum/{param1}/{param2}/{param3}', [UnitKerjaController::class, 'berkasUmumBKPPD']);
        Route::get('/berkas/khusus/{param1}/{param2}/{param3}', [UnitKerjaController::class, 'berkasKhususBKPPD']);
        Route::post('/berkas/verifikasi', [UnitKerjaController::class, 'verifikasiBKPPD']);
    });
});

//Access by role client
Route::group(['prefix' => 'klien'], function () {

    Route::get('/dashboard', [KlienController::class, 'dashboard']);
    Route::post('/update/foto', [KlienController::class, 'updateFoto']);

    Route::get('/dataumum', [KlienController::class, 'dataUmum']);
    Route::group(['prefix' => 'dataumum'], function () {

        //data umum ubah identitas
        Route::get('/identitas/edit', [IdentitasController::class, 'UEditForm']);
        Route::post('/identitas/update', [IdentitasController::class, 'UUpdate']);
        Route::post('/identitas/ganti-gambar', [KlienController::class, 'gantiGambarIdentitas']);

        // Route::post('/identitas/update', [DiklatKlienControllerController::class, 'UUpdateIdentitas']);
        //data umum riwayat pangkat
        Route::get('/riwayat-pangkat', [RiwayatPangkatController::class, 'UmumView']);
        Route::get('/riwayat-pangkat/add', [RiwayatPangkatController::class, 'UaddFormRPangkat']);
        Route::post('/riwayat-pangkat/store', [RiwayatPangkatController::class, 'UAddStoreRPangkat']);

        //data umum riwayat pendidikan
        Route::get('/riwayat-pendidikan', [PendidikanController::class, 'UmumView']);
        Route::get('/riwayat-pendidikan/add', [PendidikanController::class, 'UAddForm']);
        Route::post('/riwayat-pendidikan/store', [PendidikanController::class, 'UStore']);

        //data umum riwayat jabatan
        Route::get('/riwayat-jabatan', [RiwayatJabatanController::class, 'UmumView']);
        Route::get('/riwayat-jabatan/add', [RiwayatJabatanController::class, 'UaddForm']);
        Route::post('/riwayat-jabatan/store', [RiwayatJabatanController::class, 'UStrore']);

        //Get Jabatan berdasarkan Unit Kerja dengan Ajax
        Route::post('/jabatan/get', [RiwayatJabatanController::class, 'getJabatan']);

        //data umum riwayat diklat
        Route::get('/diklat', [DiklatController::class, 'UmumView']);
        Route::get('/diklat/add', [DiklatController::class, 'UaddForm']);
        Route::post('/diklat/store', [DiklatController::class, 'UStore']);

        //data umum riwayat keluarga
        Route::get('/keluarga', [KeluargaController::class, 'UmumView']);
        Route::get('/keluarga/add', [KeluargaController::class, 'UaddForm']);
        Route::post('/keluarga/store', [KeluargaController::class, 'UStore']);

        //data umum tanda jasa
        Route::get('/tandajasa', [TandaJasaController::class, 'UmumView']);
        Route::get('/tandajasa/add', [TandaJasaController::class, 'UaddForm']);
        Route::post('/tandajasa/store', [TandaJasaController::class, 'UStore']);
    });

    Route::get('/datakhusus', [KlienController::class, 'dataKhusus']);
    Route::group(['prefix' => 'layanan'], function () {
        Route::get('/layanankhusus', [KlienController::class, 'dataKhususLayanan']);
        Route::get('/listsurat', [KlienController::class, 'indexListSurat']);
        Route::get('/satyalencana', [KlienController::class, 'satyaLencanaForm']);
        Route::post('/satyaadd', [KlienController::class, 'satyaLencanaAdd']);
        Route::get('/ibel', [KlienController::class, 'ibelForm']);
        Route::post('/ibeladd', [KlienController::class, 'ibelAdd']);
        Route::get('/mkppi', [KlienController::class, 'mkppiForm']);
        Route::post('/mkppiadd', [KlienController::class, 'mkppiAdd']);
        Route::get('/mpkpjft', [KlienController::class, 'mpkpjftForm']);
        Route::post('/mpkpjftadd', [KlienController::class, 'mpkpjftAdd']);
        Route::get('/pkpr', [KlienController::class, 'pkprForm']);
        Route::post('/pkpradd', [KlienController::class, 'pkprAdd']);
        Route::get('/kpjs', [KlienController::class, 'kpjsForm']);
        Route::post('/kpjsadd', [KlienController::class, 'kpjsAdd']);
    });
});
