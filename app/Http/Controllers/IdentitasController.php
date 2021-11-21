<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Identitas;
use App\Models\UnitKerja;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Pangkat;
use App\Models\Jabatan;
use App\Models\Role;
use File;


class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('identitas.index', [
            'page' => 'Data Identitas',
            "rows" => Identitas::select(['identitas.*', 'kelurahan.*', 'kecamatan.*', 'jabatan.*', 'pangkat.*', 'unit_kerja.*'])->join("kelurahan", "kelurahan.kelurahan_id", "=", "identitas.kelurahan_id")->join("kecamatan", "kecamatan.kecamatan_id", "=", "identitas.kecamatan_id")->join("jabatan", "jabatan.jabatan_id", "=", "identitas.jabatan_id")->join("pangkat", "pangkat.pangkat_id", "=", "identitas.pangkat_id")->join("unit_kerja", "unit_kerja.unit_kerja_id", "=", "identitas.unit_kerja_id")->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('identitas.create-form', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'rowsRole' => Role::latest()->get(),
            'golongan_darah' => ['A', 'B', 'AB', 'O'],
            'rowsAgama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Lain-lain'],
            'rowsStatusKawin' => ['Belum Kawin', 'Kawin', 'Janda', 'Duda'],
            'rowsBBP' => ['BUM', 'PUM', 'BM', 'PT'],
            'rowsStatusPegawai' => ['Calon PNS', 'PNS', 'Pensiunan', 'TNI'],
            'rowsJenisPegawai' => ['PNS Pusat DEPDAGRI', 'PNS Pusat DEPDAGRI DPK', 'PNS Pusat DEPDAGRI DPB', 'PNS Daerah Otonom', 'PNS Pusat DEP lain DPK', 'PNS Pusat DEP lain DPB', 'TNI yang ditugas karyakan'],
            'rowsKedudukanPegawai' => ['Aktif', 'CLTN', 'Perpanjangan CLTN', 'Tugas Belajar', 'Pemberhentian Sementara', 'Penerima Uang Tunggu', 'Wajib Militer', 'PNS yang dinyatakan hilang', 'Pejabat Negara', 'Kepala Desa', 'Keberatan Atas Hukuman Disiplin', 'Tidak Aktif', 'MPP'],
            'page' => 'Tambah Identitas',
        ]);
    }
    //form ubah umum
    public function UEditForm()
    {
        return view('klien.form-umum.identitas.update', [
            'page' => 'Ubah Identitas',
            'data' => Identitas::find(auth()->user()->identitas_id),
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'rowsRole' => Role::latest()->get(),
            'golongan_darah' => ['A', 'B', 'AB', 'O'],
            'rowsAgama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Lain-lain'],
            'rowsStatusKawin' => ['Belum Kawin', 'Kawin', 'Janda', 'Duda'],
            'rowsBBP' => ['BUM', 'PUM', 'BM', 'PT'],
            'rowsStatusPegawai' => ['Calon PNS', 'PNS', 'Pensiunan', 'TNI'],
            'rowsJenisPegawai' => ['PNS Pusat DEPDAGRI', 'PNS Pusat DEPDAGRI DPK', 'PNS Pusat DEPDAGRI DPB', 'PNS Daerah Otonom', 'PNS Pusat DEP lain DPK', 'PNS Pusat DEP lain DPB', 'TNI yang ditugas karyakan'],
            'rowsKedudukanPegawai' => ['Aktif', 'CLTN', 'Perpanjangan CLTN', 'Tugas Belajar', 'Pemberhentian Sementara', 'Penerima Uang Tunggu', 'Wajib Militer', 'PNS yang dinyatakan hilang', 'Pejabat Negara', 'Kepala Desa', 'Keberatan Atas Hukuman Disiplin', 'Tidak Aktif', 'MPP'],
        ]);
    }
    //update proses umum
    public function UUpdate(Request $request)
    {
        $identitas = Identitas::find($request->input('identitas_id'));

        $nip = $identitas['nip'] != $request->input('nip') ? '|unique:identitas' : '';

        $hp = $identitas['hp'] != $request->input('hp') ? '|unique:identitas' : '';

        $no_karpeg = $identitas['no_karpeg'] != $request->input('no_karpeg') ? '|unique:identitas' : '';
        $no_taspen = $identitas['no_taspen'] != $request->input('no_taspen') ? '|unique:identitas' : '';
        $npwp = $identitas['npwp'] != $request->input('npwp') ? '|unique:identitas' : '';
        $no_bpjs = $identitas['no_bpjs'] != $request->input('no_bpjs') ? '|unique:identitas' : '';
        $no_kariskarsu = $identitas['no_kariskarsu'] != $request->input('no_kariskarsu') ? '|unique:identitas' : '';
        $nik = $identitas['nik'] != $request->input('nik') ? '|unique:identitas' : '';

        $foto = $request->file('foto') ? 'file|mimes:png,jpg,jpeg|max:500' : '';
        $karpeg = $request->file('karpeg') ? 'file|mimes:pdf|max:500' : '';
        $berkala_terakhir = $request->file('berkala_terakhir') ? 'file|mimes:pdf|max:500' : '';

        $rules = [
            'nip' => 'required|numeric|digits:18' . $nip,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before:' . today(),
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'kedudukan_kepegawaian' => 'required',
            'bantuan_bepetarum_pns' => 'required',
            'tahun_bantuan_bepetarum_pns' => 'required|numeric|digits:4',
            'status_kawin' => 'required',
            'rt_rw' => 'required',
            'hp' => 'required|numeric|digits_between:11,12' . $hp,
            'kelurahan_id' => 'required',
            'kecamatan_id' => 'required',
            'golongan_darah' => 'required',
            'foto' => '' . $foto,
            'karpeg' => '' . $karpeg,
            'berkala_terakhir' => '' . $berkala_terakhir,
            'no_karpeg' => 'required' . $no_karpeg,
            'no_taspen' => 'required' . $no_taspen,
            'npwp' => 'required' . $npwp,
            'no_bpjs' => 'required' . $no_bpjs,
            'no_kariskarsu' => 'required' . $no_kariskarsu,
            'nik' => 'required|numeric|digits:16' . $nik,
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
            'role_id' => 'required',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
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
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $request->file('foto'),
            'karpeg' => $request->file('karpeg'),
            'berkala_terakhir' => $request->file('berkala_terakhir'),
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'date' => '*Kolom :attribute tidak valid.',
        ];
        $identitas_id = $request->identitas_id;
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dataumum/identitas/edit' . $identitas_id . '/edit')->withErrors($validator)->withInput();
        }

        $pathFoto = $identitas['foto'];
        if ($request->file('foto')) {
            File::delete(public_path($pathFoto));
            $extFoto = $request->file('foto')->getClientOriginalExtension();
            $newFileFoto = $request->input('nip') . "." . $extFoto;
            $tempFoto = $request->file('foto')->getPathName();
            $folderFoto = "unggah/identitas/foto/" . $newFileFoto;
            move_uploaded_file($tempFoto, $folderFoto);
            $pathFoto = "/unggah/identitas/foto/" . $newFileFoto;
        }

        $pathKarpeg = $identitas['karpeg'];
        if ($request->file('karpeg')) {
            File::delete(public_path($pathKarpeg));
            $extKarpeg = $request->file('karpeg')->getClientOriginalExtension();
            $newFileKarpeg = $request->input('nip') . "." . $extKarpeg;
            $tempKarpeg = $request->file('karpeg')->getPathName();
            $folderKarpeg = "unggah/identitas/karpeg/" . $newFileKarpeg;
            move_uploaded_file($tempKarpeg, $folderKarpeg);
            $pathKarpeg = "/unggah/identitas/karpeg/" . $newFileKarpeg;
        }

        $pathBerkala = $identitas['berkala_terakhir'];
        if ($request->file('berkala_terakhir')) {
            File::delete(public_path($pathBerkala));
            $extBerkala = $request->file('berkala_terakhir')->getClientOriginalExtension();
            $newFileBerkala = $request->input('nip') . "." . $extBerkala;
            $tempBerkala = $request->file('berkala_terakhir')->getPathName();
            $folderBerkala = "unggah/identitas/berkala-terakhir/" . $newFileBerkala;
            move_uploaded_file($tempBerkala, $folderBerkala);
            $pathBerkala = "/unggah/identitas/berkala-terakhir/" . $newFileBerkala;
        }

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
            'foto' => $pathFoto,
            'karpeg' => $pathKarpeg,
            'berkala_terakhir' => $pathBerkala,
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        Identitas::where('identitas_id', $identitas_id)->update($data);

        return redirect('/klien/dashboard')->with('success', 'Data berhasil diubah');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nip' => 'required|numeric|digits:18|unique:identitas',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before:' . today(),
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'kedudukan_kepegawaian' => 'required',
            'bantuan_bepetarum_pns' => 'required',
            'tahun_bantuan_bepetarum_pns' => 'required|digits:4',
            'status_kawin' => 'required',
            'rt_rw' => 'required',
            'hp' => 'required|numeric|unique:identitas|digits_between:11,12',
            'kelurahan_id' => 'required',
            'kecamatan_id' => 'required',
            'golongan_darah' => 'required',
            'foto' => 'file|mimes:png,jpg,jpeg|max:500',
            'karpeg' => 'file|mimes:pdf|max:500',
            'berkala_terakhir' => 'file|mimes:pdf|max:500',
            'no_karpeg' => 'required|unique:identitas',
            'no_taspen' => 'required|unique:identitas',
            'npwp' => 'required|unique:identitas',
            'no_bpjs' => 'required|numeric|unique:identitas',
            'no_kariskarsu' => 'required|unique:identitas',
            'nik' => 'required|numeric|unique:identitas|digits:16',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
            'role_id' => 'required',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
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
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $request->file('foto'),
            'karpeg' => $request->file('karpeg'),
            'berkala_terakhir' => $request->file('berkala_terakhir'),
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'date' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/identitas/create')->withErrors($validator)->withInput();
        }

        $extFoto = $request->file('foto')->getClientOriginalExtension();
        $newFileFoto = $request->input('nip') . "." . $extFoto;
        $tempFoto = $request->file('foto')->getPathName();
        $folderFoto = "unggah/identitas/foto/" . $newFileFoto;
        move_uploaded_file($tempFoto, $folderFoto);
        $pathFoto = "/unggah/identitas/foto/" . $newFileFoto;

        $extKarpeg = $request->file('karpeg')->getClientOriginalExtension();
        $newFileKarpeg = $request->input('nip') . "." . $extKarpeg;
        $tempKarpeg = $request->file('karpeg')->getPathName();
        $folderKarpeg = "unggah/identitas/karpeg/" . $newFileKarpeg;
        move_uploaded_file($tempKarpeg, $folderKarpeg);
        $pathKarpeg = "/unggah/identitas/karpeg/" . $newFileKarpeg;

        $extBerkala = $request->file('berkala_terakhir')->getClientOriginalExtension();
        $newFileBerkala = $request->input('nip') . "." . $extBerkala;
        $tempBerkala = $request->file('berkala_terakhir')->getPathName();
        $folderBerkala = "unggah/identitas/berkala-terakhir/" . $newFileBerkala;
        move_uploaded_file($tempBerkala, $folderBerkala);
        $pathBerkala = "/unggah/identitas/berkala-terakhir/" . $newFileBerkala;

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
            'foto' => $pathFoto,
            'karpeg' => $pathKarpeg,
            'berkala_terakhir' => $pathBerkala,
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        Identitas::create($data);

        return redirect('/identitas')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($identitas_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($identitas_id)
    {
        return view('identitas.edit-form', [
            'page' => 'Ubah Identitas',
            'data' => Identitas::find($identitas_id),
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'rowsRole' => Role::latest()->get(),
            'golongan_darah' => ['A', 'B', 'AB', 'O'],
            'rowsAgama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Lain-lain'],
            'rowsStatusKawin' => ['Belum Kawin', 'Kawin', 'Janda', 'Duda'],
            'rowsBBP' => ['BUM', 'PUM', 'BM', 'PT'],
            'rowsStatusPegawai' => ['Calon PNS', 'PNS', 'Pensiunan', 'TNI'],
            'rowsJenisPegawai' => ['PNS Pusat DEPDAGRI', 'PNS Pusat DEPDAGRI DPK', 'PNS Pusat DEPDAGRI DPB', 'PNS Daerah Otonom', 'PNS Pusat DEP lain DPK', 'PNS Pusat DEP lain DPB', 'TNI yang ditugas karyakan'],
            'rowsKedudukanPegawai' => ['Aktif', 'CLTN', 'Perpanjangan CLTN', 'Tugas Belajar', 'Pemberhentian Sementara', 'Penerima Uang Tunggu', 'Wajib Militer', 'PNS yang dinyatakan hilang', 'Pejabat Negara', 'Kepala Desa', 'Keberatan Atas Hukuman Disiplin', 'Tidak Aktif', 'MPP'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identitas_id)
    {
        $identitas = Identitas::find($identitas_id);

        $nip = $identitas['nip'] != $request->input('nip') ? '|unique:identitas' : '';

        $hp = $identitas['hp'] != $request->input('hp') ? '|unique:identitas' : '';

        $no_karpeg = $identitas['no_karpeg'] != $request->input('no_karpeg') ? '|unique:identitas' : '';
        $no_taspen = $identitas['no_taspen'] != $request->input('no_taspen') ? '|unique:identitas' : '';
        $npwp = $identitas['npwp'] != $request->input('npwp') ? '|unique:identitas' : '';
        $no_bpjs = $identitas['no_bpjs'] != $request->input('no_bpjs') ? '|unique:identitas' : '';
        $no_kariskarsu = $identitas['no_kariskarsu'] != $request->input('no_kariskarsu') ? '|unique:identitas' : '';
        $nik = $identitas['nik'] != $request->input('nik') ? '|unique:identitas' : '';

        $foto = $request->file('foto') ? 'file|mimes:png,jpg,jpeg|max:500' : '';
        $karpeg = $request->file('karpeg') ? 'file|mimes:pdf|max:500' : '';
        $berkala_terakhir = $request->file('berkala_terakhir') ? 'file|mimes:pdf|max:500' : '';

        $rules = [
            'nip' => 'required|numeric|digits:18' . $nip,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before:' . today(),
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_kepegawaian' => 'required',
            'jenis_kepegawaian' => 'required',
            'kedudukan_kepegawaian' => 'required',
            'bantuan_bepetarum_pns' => 'required',
            'tahun_bantuan_bepetarum_pns' => 'required|numeric|digits:4',
            'status_kawin' => 'required',
            'rt_rw' => 'required',
            'hp' => 'required|numeric|digits_between:11,12' . $hp,
            'kelurahan_id' => 'required',
            'kecamatan_id' => 'required',
            'golongan_darah' => 'required',
            'foto' => '' . $foto,
            'karpeg' => '' . $karpeg,
            'berkala_terakhir' => '' . $berkala_terakhir,
            'no_karpeg' => 'required' . $no_karpeg,
            'no_taspen' => 'required' . $no_taspen,
            'npwp' => 'required' . $npwp,
            'no_bpjs' => 'required' . $no_bpjs,
            'no_kariskarsu' => 'required' . $no_kariskarsu,
            'nik' => 'required|numeric|digits:16' . $nik,
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
            'role_id' => 'required',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
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
            'kelurahan_id' => $request->input('kelurahan_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'golongan_darah' => $request->input('golongan_darah'),
            'foto' => $request->file('foto'),
            'karpeg' => $request->file('karpeg'),
            'berkala_terakhir' => $request->file('berkala_terakhir'),
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'date' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/identitas/' . $identitas_id . '/edit')->withErrors($validator)->withInput();
        }

        $pathFoto = $identitas['foto'];
        if ($request->file('foto')) {
            File::delete(public_path($pathFoto));
            $extFoto = $request->file('foto')->getClientOriginalExtension();
            $newFileFoto = $request->input('nip') . "." . $extFoto;
            $tempFoto = $request->file('foto')->getPathName();
            $folderFoto = "unggah/identitas/foto/" . $newFileFoto;
            move_uploaded_file($tempFoto, $folderFoto);
            $pathFoto = "/unggah/identitas/foto/" . $newFileFoto;
        }

        $pathKarpeg = $identitas['karpeg'];
        if ($request->file('karpeg')) {
            File::delete(public_path($pathKarpeg));
            $extKarpeg = $request->file('karpeg')->getClientOriginalExtension();
            $newFileKarpeg = $request->input('nip') . "." . $extKarpeg;
            $tempKarpeg = $request->file('karpeg')->getPathName();
            $folderKarpeg = "unggah/identitas/karpeg/" . $newFileKarpeg;
            move_uploaded_file($tempKarpeg, $folderKarpeg);
            $pathKarpeg = "/unggah/identitas/karpeg/" . $newFileKarpeg;
        }

        $pathBerkala = $identitas['berkala_terakhir'];
        if ($request->file('berkala_terakhir')) {
            File::delete(public_path($pathBerkala));
            $extBerkala = $request->file('berkala_terakhir')->getClientOriginalExtension();
            $newFileBerkala = $request->input('nip') . "." . $extBerkala;
            $tempBerkala = $request->file('berkala_terakhir')->getPathName();
            $folderBerkala = "unggah/identitas/berkala-terakhir/" . $newFileBerkala;
            move_uploaded_file($tempBerkala, $folderBerkala);
            $pathBerkala = "/unggah/identitas/berkala-terakhir/" . $newFileBerkala;
        }

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
            'foto' => $pathFoto,
            'karpeg' => $pathKarpeg,
            'berkala_terakhir' => $pathBerkala,
            'no_karpeg' => $request->input('no_karpeg'),
            'no_taspen' => $request->input('no_taspen'),
            'npwp' => $request->input('npwp'),
            'no_bpjs' => $request->input('no_bpjs'),
            'no_kariskarsu' => $request->input('no_kariskarsu'),
            'nik' => $request->input('nik'),
            'pangkat_id' => $request->input('pangkat_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'role_id' => $request->input('role_id'),
        ];

        Identitas::where('identitas_id', $identitas_id)->update($data);

        return redirect('/identitas')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $identitas_id)
    {
        File::delete(public_path($request->input('foto')));
        File::delete(public_path($request->input('karpeg')));
        File::delete(public_path($request->input('berkala_terakhir')));
        Identitas::destroy($identitas_id);
        return redirect('/identitas')->with('success', 'Data berhasil dihapus');
    }
}
