<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\UnitKerja;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Pangkat;
use App\Models\RiwayatJabatan;
use App\Models\Jabatan;
use File;

class RiwayatJabatanController extends Controller
{
    public function index()
    {
        return view('riwayatJabatan.index', [
            'page' => 'Data Jabatan',
            "rows" => RiwayatJabatan::select(['identitas.nama', 'riwayat_jabatan.*', 'jabatan.nama_jabatan', 'jabatan.jabatan_id', 'identitas.identitas_id'])->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function addForm()
    {
        return view('riwayatJabatan.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsJabatan' => Jabatan::latest()->get(),
            'page' => 'Admin | Tambah Riwayat Jabatan',
        ]);
    }

    public function add(Request $request)
    {
        $id = Identitas::where('nip', $request->input('identitas_id'))->first();
        $rules = [
            'jabatan_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required',
            'tgl_sk' => 'required',
            'tmt' => 'required',
        ];

        $input = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt' => $request->input('tmt'),
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

        $temp = $request->file('sk')->getPathName();
        $file = $request->input('identitas_id') . "-jabatan-" . date('s');

        $folder = "upload/sk-jabatan/" . $file . ".pdf";
        move_uploaded_file($temp, $folder);

        $name = $request->input('identitas_id') . "-jabatan-" . date('s');

        // $validator = Validator::make($input, $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect('/riwayat-jabatan/add')->withErrors($validator)->withInput();
        // }

        $data = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $id['identitas_id'],
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_jabatan' => $request->input('tmt'),
            'sk_jabatan' => $name,
        ];
        RiwayatJabatan::create($data);

        return redirect('/riwayat-jabatan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($riwayat_id)
    {
        $riwayat = RiwayatJabatan::where('riwayat_jabatan_id', $riwayat_id)->first();
        $identitas = Identitas::where('identitas_id', $riwayat['identitas_id'])->first();

        return view('riwayatJabatan.update-form', [
            'page' => 'Ubah Data Jabatan',
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsNip' => $identitas,
            'rowsJabatan' => Jabatan::latest()->get(),
            'rowRiwayatJabatan' => RiwayatJabatan::where('riwayat_jabatan_id', $riwayat_id)->first()
        ]);
    }

    public function update(Request $request)
    {
        $id = Identitas::where('nip', $request->input('identitas_id'))->first();
        $data = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $id['identitas_id'],
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_jabatan' => $request->input('tmt')
        ];
        RiwayatJabatan::where('riwayat_jabatan_id', $request->input('riwayat_jabatan_id'))->update($data);
        return redirect('/riwayat-jabatan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $q = RiwayatJabatan::where('riwayat_jabatan_id', $request->input('riwayat_jabatan_id'))->first();
        File::delete(public_path('/upload/sk-jabatan/' . $q['sk_jabatan'] . '.pdf'));
        // unlink('/upload/sk-jabatan/' . $q['sk_jabatan'] . '.pdf');
        RiwayatJabatan::destroy($request->input('riwayat_jabatan_id'));
        return redirect('/riwayat-jabatan')->with('success', 'Data berhasil dihapus');
    }
}
