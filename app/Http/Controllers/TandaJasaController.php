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
            "rows" => TandaJasa::select('tanda_jasa.*', 'identitas.nama AS nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'tanda_jasa.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
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
        $data = Identitas::where('nip', $request->input('nip'))->first();
        $rules = [
            'nip' => 'required',
            'nama' => 'required',
            'no_sk' => 'required|unique:tanda_jasa',
            'tgl_sk' => 'required|date',
            'tahun' => 'required|numeric|digits:4',
            'asal_perolehan' => 'required',
            'sertifikat' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'date' => '*Kolom :attribute tidak valid.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'digits' => '*Kolom :attribute tidak sesuai.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/tandajasa/add')->withErrors($validator)->withInput();
        }

        $extension = $request->file('sertifikat')->getClientOriginalExtension();

        $temp = $request->file('sertifikat')->getPathName();
        $newFile = $data['identitas_id'] . "-TandaJasa-" . time() .  "." . $extension;
        $folder = "unggah/sertifikat-tandajasa/" . $newFile;
        move_uploaded_file($temp, $folder);

        $newFile = '/unggah/sertifikat-tandajasa/' . $newFile;

        $data = [
            'identitas_id' => $data['identitas_id'],
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

        $tanda_jasa = TandaJasa::find($request->input('tanda_jasa_id'));

        $no_sk = $tanda_jasa['no_sk'] != $request->input('no_sk') ? '|unique:tanda_jasa' : '';
        $sertifikat = $request->file('sertifikat') ? 'file|mimes:pdf|max:500' : '';
        $rules = [
            'nip' => 'required',
            'identitas_id' => 'required',
            'nama' => 'required',
            'no_sk' => 'required' . $no_sk,
            'tgl_sk' => 'required|date',
            'tahun' => 'required|numeric|digits:4',
            'asal_perolehan' => 'required',
            'sertifikat' => '' . $sertifikat,
        ];

        $input = [
            'nip' => $request->input('nip'),
            'identitas_id' => $id_identitas['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'date' => '*Kolom :attribute tidak valid.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/tandajasa/update/' . $request->input('tanda_jasa_id'))->withErrors($validator)->withInput();
        }
        $pathtandajasa = $tanda_jasa['sertifikat'];

        if ($request->file('sertifikat')) {

            File::delete(public_path($pathtandajasa));
            $cum = explode("/", $pathtandajasa);
            $newFiletandajasa = end($cum);
            $temptandajasa = $request->file('sertifikat')->getPathName();
            $foldertandajasa = "unggah/sertifikat-tandajasa/" . $newFiletandajasa;
            move_uploaded_file($temptandajasa, $foldertandajasa);
            $pathtandajasa = "/unggah/sertifikat-tandajasa/" . $newFiletandajasa;
        }
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $pathtandajasa,
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

    //Umum view
    public function UmumView()
    {
        return view('klien.form-umum.tanda-jasa.index', [
            'page' => 'Data Tanda Jasa',
            "rows" => TandaJasa::select('tanda_jasa.*')->join('identitas', 'identitas.identitas_id', '=', 'tanda_jasa.identitas_id')->latest()->where('tanda_jasa.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    // Umum add
    public function UaddForm()
    {
        return view('klien.form-umum.tanda-jasa.add', [
            'page' => 'Tambah Tanda Jasa',
        ]);
    }

    //Store umum
    public function UStore(Request $request)
    {
        $data = Identitas::find(auth()->user()->identitas_id)->first();

        $rules = [
            'identitas_id' => 'required',
            'nama' => 'required',
            'no_sk' => 'required|unique:tanda_jasa',
            'tgl_sk' => 'required|date',
            'tahun' => 'required|numeric|digits:4',
            'asal_perolehan' => 'required',
            'sertifikat' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => auth()->user()->identitas_id,
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'date' => '*Kolom :attribute tidak valid.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'digits' => '*Kolom :attribute tidak sesuai.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dataumum/tandajasa/add')->withErrors($validator)->withInput();
        }

        $extension = $request->file('sertifikat')->getClientOriginalExtension();

        $temp = $request->file('sertifikat')->getPathName();
        $newFile = $data['identitas_id'] . "-TandaJasa-" . time() .  "." . $extension;
        $folder = "unggah/sertifikat-tandajasa/" . $newFile;
        move_uploaded_file($temp, $folder);
        $newFile = '/unggah/sertifikat-tandajasa/' . $newFile;

        $data = [
            'identitas_id' => $data['identitas_id'],
            'nama' => $request->input('nama'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tahun' => $request->input('tahun'),
            'asal_perolehan' => $request->input('asal_perolehan'),
            'sertifikat' => $newFile,
        ];

        TandaJasa::create($data);

        return redirect('/klien/dataumum/tandajasa')->with('success', 'Data berhasil ditambahkan');
    }
}
