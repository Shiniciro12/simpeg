<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\UnitKerja;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Pangkat;
use App\Models\Jabatan;
use App\Models\diklat;
use Diklat as GlobalDiklat;
use File;


class DiklatController extends Controller
{
    public function index()
    {
        return view('diklat.index', [
            'page' => 'Data Diklat',
            "rows" => diklat::select('diklat.*', 'identitas.nama as nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'diklat.identitas_id')->latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('diklat.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Diklat',
        ]);
    }

    public function add(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $rules = [
            'identitas_id' => '',
            'status' => '',
            'nama' => 'required',
            'tempat' => 'required',
            'penyelenggara' => 'required',
            'angka' => 'required',
            'tgl_mulai' => 'required|before:today',
            'tgl_selesai' => 'required',
            'jam' => 'required',
            'no_sttp' => 'required|unique:diklat',
            'tgl_sttp' => 'required ',
            'sertifikat' => 'file|mimes:pdf|max:1000',
        ];

        $input = [
            'identitas_id' => $request->input('identitas_id'),
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->file('sertifikat'),
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
            return redirect('/diklat/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sertifikat')->getPathName();
        $file = $id_identitas['identitas_id'] . "-diklat-" . date('s');

        $folder = "upload/sertifikat-diklat/" . $file . ".pdf";
        move_uploaded_file($temp, $folder);

        $name = $id_identitas['identitas_id'] . "-diklat-"  . date('s');

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $name . ".pdf",
        ];

        diklat::create($data);

        return redirect('/diklat')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Diklat::where('diklat_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('diklat.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsDiklat' => $ambil_data,
            'page' => 'Tambah Diklat',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->input('sertifikat'),
        ];

        Diklat::where('diklat_id', $request->input('diklat_id'))->update($data);

        return redirect('/diklat')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $diklat = Diklat::where('diklat_id', $request->input('diklat_id'))->first();
        File::delete(public_path('upload/sertifikat-diklat/' . $diklat['sertifikat']));
        Diklat::destroy($request->input('diklat_id'));
        return redirect('/diklat')->with('success', 'Data berhasil dihapus');
    }
}