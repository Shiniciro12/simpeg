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
use App\Models\Pendidikan;
use File;

class PendidikanController extends Controller
{
    public function index()
    {
        return view('pendidikan.index', [
            'page' => 'Data Pendidikan',
            "rows" => Pendidikan::select('pendidikan.*', 'identitas.nama as nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'pendidikan.identitas_id')->latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('pendidikan.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Pendidikan',
        ]);
    }

    public function add(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $rules = [
            'identitas_id' => '',
            'tingkat_pendidikan' => '',
            'jurusan' => 'required',
            'nama_lembaga_pendidikan' => 'required',
            'tempat' => 'required',
            'nama_kepsek_rektor' => 'required',
            'no_sttb' => 'required|before:today',
            'tgl_sttb' => 'required',
            'sttb' => '',
        ];

        $input = [
            'identitas_id' => $request->input('identitas_id'),
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $request->input('sttb'),
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
            return redirect('/pendidikan/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sttb')->getPathName();
        $file = $id_identitas['identitas_id'] . "-sttb-" . date('s');

        $folder = "upload/sttb/" . $file . ".pdf";
        move_uploaded_file($temp, $folder);

        $name = $id_identitas['identitas_id'] . "-sttb-"  . date('s');

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $name . ".pdf",
        ];

        Pendidikan::create($data);

        return redirect('/pendidikan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Pendidikan::where('pendidikan_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('pendidikan.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsPendidikan' => $ambil_data,
            'page' => 'Ubah Pendidikan',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $pendidikan = Pendidikan::find($request->input('pendidikan_id'));
        
       
        $no_sttb = $pendidikan['no_sttb'] != $request->input('no_sttb') ? '|unique:pendidikan' : '';

        $rules = [
            'identitas_id' => '',
            'tingkat_pendidikan' => '',
            'jurusan' => 'required',
            'nama_lembaga_pendidikan' => 'required',
            'tempat' => 'required',
            'nama_kepsek_rektor' => 'required',
            'no_sttb' => 'required|before:today'.$no_sttb,
            'tgl_sttb' => 'required',
            'sttb' => '',
        ];

        $input = [
            'identitas_id' => $request->input('identitas_id'),
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $request->input('sttb'),
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
            return redirect('/pendidikan/update/'.$request->input('pendidikan_id'))->withErrors($validator)->withInput();
        }
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => 'default',
        ];

        Pendidikan::where('pendidikan_id', $request->input('pendidikan_id'))->update($data);

        return redirect('/pendidikan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $pendidikan = Pendidikan::where('pendidikan_id', $request->input('pendidikan_id'))->first();
        File::delete(public_path('upload/sttb/' . $pendidikan['sttb']));
        Pendidikan::destroy($request->input('pendidikan_id'));
        return redirect('/pendidikan')->with('success', 'Data berhasil dihapus');
    }
}
