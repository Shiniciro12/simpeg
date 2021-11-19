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
use App\Models\RiwayatPangkat;
use File;

class RiwayatPangkatController extends Controller
{
    public function index4()
    {
        return view('riwayatpangkat.index', [
            'page' => 'Data Pangkat',
            "rows" => RiwayatPangkat::select(['pangkat.*', 'riwayat_pangkat.*', 'identitas.*'])->join("pangkat", "pangkat.pangkat_id", "=", "riwayat_pangkat.pangkat_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_pangkat.identitas_id")->filter(request(['search']))->paginate(10)
        ]);
    }

    public function addForm4()
    {
        return view('riwayatpangkat.add-form-Riwayatpangkat', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'rowsIdentitas' => Identitas::latest()->limit(10)->get(),
            'page' => 'Tambah Pangkat',
        ]);
    }

    public function add4(Request $request)
    {
        $id = Identitas::where('nip', $request->input('identitas_id'))->first();

        $rules = [
            'pangkat_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required|unique:riwayat_pangkat',
            'tgl_sk' => 'required|date',
            'tmt_pangkat' => 'required|date',
            'sk_pangkat' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $request->file('sk_pangkat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'date' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect('/riwayatpangkat/add')->withErrors($validator)->withInput();
        }

        $extension = $request->file('sk_pangkat')->getClientOriginalExtension();

        $newFile =  $request->input('pangkat_id') . "-pangkat-" . date('s') .  "." . $extension;

        $temp = $request->file('sk_pangkat')->getPathName();
        $folder = "unggah/riwayat-pangkat/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/unggah/riwayat-pangkat/" . $newFile;

        $data = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'identitas_id' => $id['identitas_id'],
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $path,
        ];

        RiwayatPangkat::create($data);

        return redirect('/riwayatpangkat')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $riwayat_pangkat = RiwayatPangkat::find($request->input('riwayat_pangkat_id'));

        $rules_pangkat_id = $riwayat_pangkat['no_sk'] != $request->input('no_sk') ? '|unique:riwayat_pangkat' : '';
        $sk_pangkat = $request->file('sk_pangkat') ? 'required|file|mimes:pdf|max:500' : '';
        $rules = [
            'pangkat_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required' . $rules_pangkat_id,
            'tgl_sk' => 'required|date',
            'tmt_pangkat' => 'required|date',
            'sk_pangkat' => '' . $sk_pangkat,
        ];

        $input = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $request->file('sk_pangkat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'date' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/riwayatpangkat/update/' . $request->input('riwayat_pangkat_id'))->withErrors($validator)->withInput();
        }
        $pathriwayat_pangkat = $riwayat_pangkat['sk_pangkat'];

        if ($request->file('sk_pangkat')) {

            File::delete(public_path($pathriwayat_pangkat));
            $extriwayat_pangkat = $request->file('sk_pangkat')->getClientOriginalExtension();
            $cum = explode("/", $pathriwayat_pangkat);
            $newFileriwayat_pangkat = end($cum);
            $tempriwayat_pangkat = $request->file('sk_pangkat')->getPathName();
            $folderriwayat_pangkat = "unggah/riwayat-pangkat/" . $newFileriwayat_pangkat;
            move_uploaded_file($tempriwayat_pangkat, $folderriwayat_pangkat);
            $pathriwayat_pangkat = "/unggah/riwayat-pangkat/" . $newFileriwayat_pangkat;
        }
        $data = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $riwayat_pangkat['identitas_id'],
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $pathriwayat_pangkat,
        ];
        RiwayatPangkat::where('riwayat_pangkat_id', $request->input('riwayat_pangkat_id'))->update($data);

        return redirect('/riwayatpangkat')->with('success', 'Data berhasil diubah');
    }

    public function updateForm4($riwayat_pangkat_id)
    {
        return view('riwayatpangkat.update-form-riwayatpangkat', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsRiwayatPangkat' => RiwayatPangkat::find($riwayat_pangkat_id),
            // 'rowsIdentitas' => Identitas::find($riwayat_pangkat_id),
            'page' => 'Ubah Pangkat',
            'data' => RiwayatPangkat::find($riwayat_pangkat_id),
        ]);
    }

    public function delete(Request $request)
    {
        File::delete(public_path($request->input('sk_pangkat')));
        RiwayatPangkat::destroy($request->input('riwayat_pangkat_id'));
        return redirect('/riwayatpangkat')->with('success', 'Data berhasil dihapus');
    }

    //Umum Form Tambah
    public function UaddFormRPangkat()
    {
        return view('klien.form-umum.riwayat-pangkat.add', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'rowsIdentitas' => Identitas::latest()->limit(10)->get(),
            'page' => 'Tambah Pangkat',
        ]);
    }
    
    //Umum View Controller
    public function UmumView()
    {
        return view('klien.form-umum.riwayat-pangkat.index', [
            'page' => 'Data Pangkat',
            "rows" => RiwayatPangkat::select(['pangkat.*', 'riwayat_pangkat.*', 'identitas.*'])->join("pangkat", "pangkat.pangkat_id", "=", "riwayat_pangkat.pangkat_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_pangkat.identitas_id")->where('riwayat_pangkat.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)
        ]);
    }

    //Umum Store add Riwayat Pangkat
    public function UAddStoreRPangkat(Request $request)
    {
        $id = Identitas::where('identitas_id', $request->input('identitas_id'))->first();

        $rules = [
            'pangkat_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required|unique:riwayat_pangkat',
            'tgl_sk' => 'required|date',
            'tmt_pangkat' => 'required|date',
            'sk_pangkat' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $request->file('sk_pangkat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'date' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect('/klien/dataumum/riwayat-pangkat/add')->withErrors($validator)->withInput();
        }

        $extension = $request->file('sk_pangkat')->getClientOriginalExtension();

        $newFile =  $request->input('pangkat_id') . "-pangkat-" . date('s') .  "." . $extension;

        $temp = $request->file('sk_pangkat')->getPathName();
        $folder = "unggah/riwayat-pangkat/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/unggah/riwayat-pangkat/" . $newFile;

        $data = [
            'pangkat_id' => $request->input('pangkat_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'identitas_id' => $id['identitas_id'],
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_pangkat' => $request->input('tmt_pangkat'),
            'sk_pangkat' => $path,
        ];

        RiwayatPangkat::create($data);

        return redirect('/klien/dataumum/riwayat-pangkat')->with('success', 'Data berhasil ditambahkan');
    }
}
