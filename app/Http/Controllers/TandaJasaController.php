<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\TandaJasa;
use App\Models\Identitas;
use File;

class TandaJasaController extends Controller
{
    public function index()
    {
        return view('tandajasa.index', [
            'page' => 'Data Tanda Jasa',
            "rows" => TandaJasa::select('tanda_jasa.*', 'identitas.nama AS nama_identitas')->join('identitas', 'identitas.identitas_id', '=', 'tanda_jasa.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('tandajasa.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Tanda Jasa',
        ]);
    }

    public function add(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $rules = [
            'nip' => 'required',
            'nama' => 'required',
            'no_sk' => 'required',
            'tgl_sk' => 'required',
            'tahun' => 'required',
            'asal_perolehan' => 'required',

        ];

        $input = [
            'nip' => $id_identitas['nip'],
            'identitas_id' => $id_identitas['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),

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
            return redirect('/tandajasa/add')->withErrors($validator)->withInput();
        }
        $extension = $request->file('sertifikat')->getClientOriginalExtension();

        $newFile =  $id_identitas['identitas_id'] . "-Tanda Jasa-" . date('s') .  "." . $extension;
        $temp = $request->file('sertifikat')->getPathName();
        $folder = "upload/sertifikat-tandajasa/" . $request->input('no_sk') . '.pdf';
        move_uploaded_file($temp, $folder);

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $newFile,

        ];

        TandaJasa::create($data);

        return redirect('/tandajasa')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = TandaJasa::where('tanda_jasa_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('tandajasa.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsTandaJasa' => $ambil_data,
            'page' => 'Ubah Tanda Jasa',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
        ];

        TandaJasa::where('tanda_jasa_id', $request->input('tanda_jasa_id'))->update($data);

        return redirect('/tandajasa')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        File::delete(public_path($request->input('sertifikat')));
        TandaJasa::destroy($request->input('tanda_jasa_id'));
        return redirect('/tandajasa')->with('success', 'Data berhasil dihapus');
    }
}