<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\UnitKerja;
use App\Models\RiwayatJabatan;
use App\Models\Jabatan;
use App\Models\Verifikasi;
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
            'no_sk' => 'required|unique:riwayat_jabatan',
            'tgl_sk' => 'required|date',
            'tmt' => 'required|date',
            'sk_jabatan' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt' => $request->input('tmt'),
            'sk_jabatan' => $request->file('sk_jabatan'),
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
            return redirect('/riwayat-jabatan/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sk_jabatan')->getPathName();
        $file = $request->input('identitas_id') . "-jabatan-" . time() . '.pdf';

        $folder = "unggah/sk-jabatan/" . $file;
        move_uploaded_file($temp, $folder);

        $name = '/unggah/sk-jabatan/' . $file;

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

        $riwayat_jabatan = RiwayatJabatan::where('identitas_id', $id['identitas_id'])->first();
        $sk_jabatan = $request->file('sk_jabatan') ? 'file|mimes:pdf|max:500' : '';

        $no_sk = $riwayat_jabatan['no_sk'] != $request->input('no_sk') ? '|unique:riwayat_jabatan' : '';
        $rules = [
            'jabatan_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required' . $no_sk,
            'tgl_sk' => 'required|date',
            'sk_jabatan' => '' . $sk_jabatan,
            'tmt' => 'required|date',
        ];

        $input = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $request->input('identitas_id'),
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt' => $request->input('tmt'),
            'sk_jabatan' => $request->file('sk_jabatan'),
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
            return redirect('/riwayat-jabatan/update/' . $request->input('riwayat_jabatan_id'))->withErrors($validator)->withInput();
        }

        $pathriwayat_jabatan = $riwayat_jabatan['sk_jabatan'];

        if ($request->file('sk_jabatan')) {

            File::delete(public_path($pathriwayat_jabatan));
            $cum = explode("/", $pathriwayat_jabatan);
            $newFileriwayat_jabatan = end($cum);
            $tempriwayat_jabatan = $request->file('sk_jabatan')->getPathName();
            $folderriwayat_jabatan = "unggah/sk-jabatan/" . $newFileriwayat_jabatan;
            move_uploaded_file($tempriwayat_jabatan, $folderriwayat_jabatan);
            $pathriwayat_jabatan = "/unggah/sk-jabatan/" . $newFileriwayat_jabatan;
        }

        $data = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $id['identitas_id'],
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'sk_jabatan' => $pathriwayat_jabatan,
            'tmt_jabatan' => $request->input('tmt')
        ];

        RiwayatJabatan::where('riwayat_jabatan_id', $request->input('riwayat_jabatan_id'))->update($data);

        return redirect('/riwayat-jabatan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $q = RiwayatJabatan::where('riwayat_jabatan_id', $request->input('riwayat_jabatan_id'))->first();
        File::delete(public_path($q['sk_jabatan']));
        RiwayatJabatan::destroy($request->input('riwayat_jabatan_id'));
        return redirect('/riwayat-jabatan')->with('success', 'Data berhasil dihapus');
    }

    public function UmumView()
    {
        return view('klien.form-umum.riwayat-jabatan.index', [
            'page' => 'Data Jabatan',
            "rows" => RiwayatJabatan::select(['identitas.nama', 'riwayat_jabatan.*', 'jabatan.nama_jabatan', 'jabatan.jabatan_id', 'identitas.identitas_id', 'verifikasi.status'])->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->join("verifikasi", "verifikasi.docx_id", "=", "riwayat_jabatan.riwayat_jabatan_id")->latest()->where('riwayat_jabatan.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)
        ]);
    }

    //Umum Form add
    public function UaddForm()
    {
        return view('klien.form-umum.riwayat-jabatan.add', [
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'page' => 'Tambah Riwayat Jabatan',
        ]);
    }

    //Store umum
    public function UStrore(Request $request)
    {
        $id = Identitas::where('identitas_id', auth()->user()->identitas_id)->first();

        $pak = '';
        if ($request->input('input_pak') == 'Fungsional') {
            $pak = 'file|mimes:pdf|max:500';
        }

        $rules = [
            'jabatan_id' => 'required',
            'identitas_id' => 'required',
            'pejabat' => 'required',
            'no_sk' => 'required|unique:riwayat_jabatan',
            'tgl_sk' => 'required|date',
            'tmt' => 'required|date',
            'sk_jabatan' => 'file|mimes:pdf|max:500',
            'file_pak' => $pak,
        ];

        $input = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => auth()->user()->identitas_id,
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt' => $request->input('tmt'),
            'sk_jabatan' => $request->file('sk_jabatan'),
            'file_pak' => $request->file('file_pak'),
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
            return redirect('/klien/dataumum/riwayat-jabatan/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sk_jabatan')->getPathName();
        $file = auth()->user()->identitas_id . "-jabatan-" . time() . ".pdf";
        $folder = "unggah/sk-jabatan/" . $file;
        move_uploaded_file($temp, $folder);
        $newNameSK = '/unggah/sk-jabatan/' . $file;

        $newNamePAK = '';
        if ($request->input('input_pak') == 'Fungsional') {
            $file = auth()->user()->identitas_id . "-pak-" . time() . '.pdf';
            $temp = $request->file('file_pak')->getPathName();
            $folder = "unggah/pak/" . $file;
            move_uploaded_file($temp, $folder);
            $newNamePAK = '/unggah/pak/' . $file;
        }

        $data = [
            'jabatan_id' => $request->input('jabatan_id'),
            'identitas_id' => $id['identitas_id'],
            'pejabat' => $request->input('pejabat'),
            'no_sk' => $request->input('no_sk'),
            'tgl_sk' => $request->input('tgl_sk'),
            'tmt_jabatan' => $request->input('tmt'),
            'sk_jabatan' => $newNameSK,
            'pak' => $newNamePAK,
        ];

        $resultCreateJabatan = RiwayatJabatan::create($data)->getAttributes();

        $dataVerifikasi = [
            'docx_id' => $resultCreateJabatan['riwayat_jabatan_id'],
            'identitas_id' => auth()->user()->identitas_id,
            'status' => '4',
            'unit_verif_at' => '',
            'bkkpd_verif_at' => '',
            'unit_verif_by' => '',
            'bkkpd_verif_by' => '',
            'jenis_data' => 'jabatan/umum',
        ];

        Verifikasi::create($dataVerifikasi);

        return redirect('/klien/dataumum/riwayat-jabatan')->with('success', 'Data berhasil ditambahkan');
    }

    public function getJabatan(Request $request)
    {
        $data = Jabatan::where('unit_kerja_id', $request->input('unitKerja'))->get();
        echo json_encode($data);
    }
}
