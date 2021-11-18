<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\Identitas;
use File;

class KeluargaController extends Controller
{
    public function index()
    {
        return view('keluarga.index', [
            'page' => 'Data Keluarga',
            "rows" => Keluarga::select('keluarga.*', 'identitas.nama AS nama_identitas')->join('identitas', 'identitas.identitas_id', '=', 'keluarga.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
    //umum view
    public function UmumView()
    {
        return view('klien.form-umum.riwayat-keluarga.index', [
            'page' => 'Data Keluarga',
            "rows" => Keluarga::select('keluarga.*', 'identitas.nama AS nama_identitas')->join('identitas', 'identitas.identitas_id', '=', 'keluarga.identitas_id')->latest()->where('keluarga.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
    //Umum add

    public function UaddForm()
    {
        return view('klien.form-umum.riwayat-keluarga.add', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Keluarga',
        ]);
    }

    //store umum
    public function UStore(Request $request)
    {
        $rules = [
            'nip' => 'required',
            'nik' => 'required|numeric|unique:keluarga|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required|date',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'kode_pos' => 'required|numeric|digits:5',
            'dokumen' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'date' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dataumum/keluarga/add')->withErrors($validator)->withInput();
        }

        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $extension = $request->file('dokumen')->getClientOriginalExtension();

        $newFile =  $id_identitas['identitas_id'] . "-Keluarga-" . date('s') .  "." . $extension;

        $temp = $request->file('dokumen')->getPathName();
        $folder = "unggah/dokumen-keluarga/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/unggah/dokumen-keluarga/" . $newFile;

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $path,
        ];

        Keluarga::create($data);

        return redirect('/klien/dataumum/keluarga')->with('success', 'Data berhasil ditambahkan');
    }


    public function addForm()
    {
        return view('keluarga.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Keluarga',
        ]);
    }

    public function add(Request $request)
    {
        $rules = [
            'nip' => 'required',
            'nik' => 'required|numeric|unique:keluarga|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required|date',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'kode_pos' => 'required|numeric|digits:5',
            'dokumen' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'date' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/keluarga/add')->withErrors($validator)->withInput();
        }

        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $extension = $request->file('dokumen')->getClientOriginalExtension();

        $newFile =  $id_identitas['identitas_id'] . "-Keluarga-" . date('s') .  "." . $extension;

        $temp = $request->file('dokumen')->getPathName();
        $folder = "unggah/dokumen-keluarga/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/unggah/dokumen-keluarga/" . $newFile;

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $path,
        ];

        Keluarga::create($data);

        return redirect('/keluarga')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Keluarga::where('keluarga_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('keluarga.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsKeluarga' => $ambil_data,
            'rowsStatusKeluarga' => ['Kepala Keluarga', 'Istri', 'Anak', 'Famili Lain'],
            'rowsStatusKawin' => ['Belum Kawin', 'Kawin', 'Janda', 'Duda'],
            'rowsPendidikan' => ['Belum Sekolah', 'TK/Paud', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'Diploma III', 'Diploma IV', 'S1/Sarjana', 'S2/Master', 'S3/Doktor'],
            'page' => 'Ubah Keluarga',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $keluarga = Keluarga::where('nik', $request->input('nik'))->first();
        $dokumen = $request->file('dokumen') ? 'required|file|mimes:pdf|max:500' : '';

        $nik = $keluarga['nik'] != $request->input('nik') ? '|unique:keluarga' : '';

        $rules = [
            'nip' => 'required',
            'nik' => 'required|numeric|digits:16' . $nik,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required|date',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'kode_pos' => 'required|numeric|digits:5',
            'dokumen' => ''. $dokumen,
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'date' => '*Kolom :attribute tidak valid.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/keluarga/add')->withErrors($validator)->withInput();
        }
        $pathkeluarga = $keluarga['dokumen'];
       
        if ($request->file('dokumen')) {
            
            File::delete(public_path($pathkeluarga));
            $extkeluarga = $request->file('dokumen')->getClientOriginalExtension();
            $cum = explode("/",$pathkeluarga);
            $newFilekeluarga = end($cum);
            $tempkeluarga = $request->file('dokumen')->getPathName();
            $folderkeluarga = "unggah/riwayat-pangkat/" . $newFilekeluarga;
            move_uploaded_file($tempkeluarga, $folderkeluarga);
            $pathkeluarga = "/unggah/riwayat-pangkat/" . $newFilekeluarga;
        }
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $pathkeluarga,
        ];

        Keluarga::where('keluarga_id', $request->input('keluarga_id'))->update($data);

        return redirect('/keluarga')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        File::delete(public_path($request->input('dokumen')));
        Keluarga::destroy($request->input('keluarga_id'));
        return redirect('/keluarga')->with('success', 'Data berhasil dihapus');
    }
}
