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
use File;

class IdentitasController extends Controller
{
    public function index()
    {
        return view('identitas.index', [
            'page' => 'Data Identitas',
            "rows" => Identitas::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('identitas.add-form', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'page' => 'Tambah Identitas',
        ]);
    }

    public function add(Request $request)
    {

        $rules = [
            'nip' => 'required|numeric|unique:identitas',
            'nama' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|before:today',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'kedudukan_kepegawaian' => 'required',
            'bantuan_bepetarum_pns' => 'required',
            'tahun_bantuan_bepetarum_pns' => 'required',
            'status_kawin' => 'required',
            'rt_rw' => 'required',
            'hp' => 'required|numeric|unique:identitas|digits_between:11,12',
            'telepon' => 'required',
            'kelurahan_id' => 'required',
            'kecamatan_id' => 'required',
            'golongan_darah' => 'required',
            'foto' => 'file|mimes:png,jpg,jpeg|max:500',
            'no_karpeg' => 'required|unique:identitas',
            'no_taspen' => 'required|unique:identitas',
            'npwp' => 'required|unique:identitas',
            'no_bpjs' => 'required|numeric|unique:identitas',
            'no_kariskarsu' => 'required|unique:identitas',
            'nik' => 'required|numeric|unique:identitas',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'gelar_depan' => $request->input('gelar_depan'),
            'gelar_belakang' => $request->input('gelar_belakang'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'status_kepegawaian' => $request->input('status_kepegawaian'),
            'jenis_kepegawaian' => $request->input('jenis_kepegawaian'),
            'kedudukan_kepegawaian' => $request->input('kedudukan_kepegawaian'),
            'bantuan_bepetarum_pns' => $request->input('bantuan_bepetarum_pns'),
            'tahun_bantuan_bepetarum_pns' => $request->input('tahun_bantuan_bepetarum_pns'),
            'status_kawin' => $request->input('status_kawin'),
            'rt_rw' => $request->input('rt_rw'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $request->file('foto'),
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'min' => '*Kolom :attribute minimal :min karakter.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/identitas/add')->withErrors($validator)->withInput();
        }


        $extension = $request->file('foto')->getClientOriginalExtension();

        $newFile = $request->input('nip') . "." . $extension;

        $temp = $request->file('foto')->getPathName();
        $folder = "upload/foto-identitas/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/upload/foto-identitas/" . $newFile;

        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'gelar_depan' => $request->input('gelar_depan'),
            'gelar_belakang' => $request->input('gelar_belakang'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'status_kepegawaian' => $request->input('status_kepegawaian'),
            'jenis_kepegawaian' => $request->input('jenis_kepegawaian'),
            'kedudukan_kepegawaian' => $request->input('kedudukan_kepegawaian'),
            'bantuan_bepetarum_pns' => $request->input('bantuan_bepetarum_pns'),
            'tahun_bantuan_bepetarum_pns' => $request->input('tahun_bantuan_bepetarum_pns'),
            'status_kawin' => $request->input('status_kawin'),
            'rt_rw' => $request->input('rt_rw'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $path,
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
        ];

        Identitas::create($data);

        return redirect('/identitas')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($identitas_id)
    {
        return view('identitas.update-form', [
            'page' => 'Ubah Identitas',
            'data' => Identitas::find($identitas_id),
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
        ]);
    }

    public function update(Request $request)
    {
        // $rules = [
        //     'nip' => 'required|numeric|unique:identitas',
        //     'nama' => 'required',
        //     'gelar_depan' => 'required',
        //     'gelar_belakang' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tgl_lahir' => 'required|before:today',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'status_kepegawaian' => 'required',
        //     'jenis_kepegawaian' => 'required',
        //     'kedudukan_kepegawaian' => 'required',
        //     'bantuan_bepetarum_pns' => 'required',
        //     'tahun_bantuan_bepetarum_pns' => 'required',
        //     'status_kawin' => 'required',
        //     'rt_rw' => 'required',
        //     'hp' => 'required|numeric|unique:identitas|digits_between:11,12',
        //     'telepon' => 'required',
        //     'kelurahan_id' => 'required',
        //     'kecamatan_id' => 'required',
        //     'golongan_darah' => 'required',
        //     'foto' => 'file|mimes:png,jpg,jpeg|max:500',
        //     'no_karpeg' => 'required|unique:identitas',
        //     'no_taspen' => 'required|unique:identitas',
        //     'npwp' => 'required|unique:identitas',
        //     'no_bpjs' => 'required|numeric|unique:identitas',
        //     'no_kariskarsu' => 'required|unique:identitas',
        //     'nik' => 'required|numeric|unique:identitas',
        //     'pangkat_id' => 'required',
        //     'jabatan_id' => 'required',
        //     'unit_kerja_id' => 'required',
        // ];

        // $input = [
        //     'nip' => $request->input('nip'),
        //     'nama' => $request->input('nama'),
        //     'gelar_depan' => $request->input('gelar_depan'),
        //     'gelar_belakang' => $request->input('gelar_belakang'),
        //     'tempat_lahir' => $request->input('tempat_lahir'),
        //     'tgl_lahir' => $request->input('tgl_lahir'),
        //     'jenis_kelamin' => $request->input('jenis_kelamin'),
        //     'agama' => $request->input('agama'),
        //     'status_kepegawaian' => $request->input('status_kepegawaian'),
        //     'jenis_kepegawaian' => $request->input('jenis_kepegawaian'),
        //     'kedudukan_kepegawaian' => $request->input('kedudukan_kepegawaian'),
        //     'bantuan_bepetarum_pns' => $request->input('bantuan_bepetarum_pns'),
        //     'tahun_bantuan_bepetarum_pns' => $request->input('tahun_bantuan_bepetarum_pns'),
        //     'status_kawin' => $request->input('status_kawin'),
        //     'rt_rw' => $request->input('rt_rw'),
        //     'hp' => $request->input('hp'),
        //     'telepon' => $request->input('telepon'),
        //     'kelurahan_id' => $request->input('kelurahan_id'),
        //     'kecamatan_id' => $request->input('kecamatan_id'),
        //     'golongan_darah' => $request->input('golongan_darah'),
        //     'foto' => $request->file('foto'),
        //     'no_karpeg' => $request->input('no_karpeg'),
        //     'no_taspen' => $request->input('no_taspen'),
        //     'npwp' => $request->input('npwp'),
        //     'no_bpjs' => $request->input('no_bpjs'),
        //     'no_kariskarsu' => $request->input('no_kariskarsu'),
        //     'nik' => $request->input('nik'),
        //     'pangkat_id' => $request->input('pangkat_id'),
        //     'jabatan_id' => $request->input('jabatan_id'),
        //     'unit_kerja_id' => $request->input('unit_kerja_id'),
        // ];

        // $messages = [
        //     'required' => '*Kolom :attribute wajib diisi.',
        //     'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
        //     'numeric' => '*Kolom :attribute harus berupa karakter angka.',
        //     'unique' => '*Kolom :attribute sudah terdaftar.',
        //     'file' => '*File :attribute wajib dipilih.',
        //     'max' => '*Kolom :attribute maksimal :max karakter.',
        //     'min' => '*Kolom :attribute minimal :min karakter.',
        // ];

        // $validator = Validator::make($input, $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect('/identitas/update/'.$request->input('identitas_id'))->withErrors($validator)->withInput();
        // }

        $extension = $request->file('foto')->getClientOriginalExtension();

        $newFile = $request->input('nip') . "." . $extension;

        $temp = $request->file('foto')->getPathName();
        $folder = "upload/foto-identitas/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/upload/foto-identitas/" . $newFile;

        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'gelar_depan' => $request->input('gelar_depan'),
            'gelar_belakang' => $request->input('gelar_belakang'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'status_kepegawaian' => $request->input('status_kepegawaian'),
            'jenis_kepegawaian' => $request->input('jenis_kepegawaian'),
            'kedudukan_kepegawaian' => $request->input('kedudukan_kepegawaian'),
            'bantuan_bepetarum_pns' => $request->input('bantuan_bepetarum_pns'),
            'tahun_bantuan_bepetarum_pns' => $request->input('tahun_bantuan_bepetarum_pns'),
            'status_kawin' => $request->input('status_kawin'),
            'rt_rw' => $request->input('rt_rw'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $path,
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
        ];

        Identitas::where('identitas_id', $request->input('identitas_id'))->update($data);

        return redirect('/identitas')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        File::delete(public_path($request->input('foto')));
        Identitas::destroy($request->input('identitas_id'));
        return redirect('/identitas')->with('success', 'Data berhasil dihapus');
    }
}
