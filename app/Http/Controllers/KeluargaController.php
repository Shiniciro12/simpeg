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
            'nik' => 'required|numeric|unique:identitas',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|before:today',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'telepon' => 'required',
            'kode_pos' => 'required|numeric',
            'dokumen' => 'file|mimes:pdf|max:1000',
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
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kontak :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'min' => '*Kolom :attribute minimal :min karakter.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/keluarga/add')->withErrors($validator)->withInput();
        }

        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $extension = $request->file('dokumen')->getClientOriginalExtension();

        $newFile =  $id_identitas['identitas_id'] . "-Keluarga-" . date('s').  "." . $extension;
        
        $temp = $request->file('dokumen')->getPathName();
        $folder = "upload/dokumen-keluarga/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/upload/dokumen-keluarga/" . $newFile;

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
            'page' => 'Ubah Keluarga',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
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