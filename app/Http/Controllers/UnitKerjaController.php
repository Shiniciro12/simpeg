<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\Identitas;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPangkat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Verifikasi;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unit-kerja.index', [
            'page' => 'Data Unit Kerja',
            "rows" => UnitKerja::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit-kerja.create-form', [
            'page' => 'Tambah Unit Kerja',
        ]);
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
            'nama_unit' => 'required|unique:unit_kerja',
            'alamat' => 'required',
            'latitude' => 'required|unique:unit_kerja',
            'longitude' => 'required|unique:unit_kerja',
        ];

        $input = [
            'nama_unit' => $request->input('nama_unit'),
            'alamat' => $request->input('alamat'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/unit-kerja/create')->withErrors($validator)->withInput();
        }

        UnitKerja::create($input);

        return redirect('/unit-kerja')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($unit_kerja_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($unit_kerja_id)
    {
        return view('unit-kerja.edit-form', [
            'page' => 'Ubah Unit Kerja',
            'data' => UnitKerja::find($unit_kerja_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unit_kerja_id)
    {
        $unit_kerja = UnitKerja::find($unit_kerja_id);

        $nama_unit = $unit_kerja['nama_unit'] != $request->input('nama_unit') ? '|unique:unit_kerja' : '';
        $latitude = $unit_kerja['latitude'] != $request->input('latitude') ? '|unique:unit_kerja' : '';
        $longitude = $unit_kerja['longitude'] != $request->input('longitude') ? '|unique:unit_kerja' : '';

        $rules = [
            'nama_unit' => 'required' . $nama_unit,
            'alamat' => 'required',
            'latitude' => 'required' . $latitude,
            'longitude' => 'required' . $longitude,
        ];

        $input = [
            'nama_unit' => $request->input('nama_unit'),
            'alamat' => $request->input('alamat'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/unit-kerja/' . $unit_kerja_id . '/edit')->withErrors($validator)->withInput();
        }

        UnitKerja::where('unit_kerja_id', $unit_kerja_id)->update($input);

        return redirect('/unit-kerja')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unit_kerja_id)
    {
        UnitKerja::destroy($unit_kerja_id);
        return redirect('/unit-kerja')->with('success', 'Data berhasil dihapus');
    }

    // public function requestLayanan(Request $request)
    // {
    //     $data = Identitas::where('nip', $request->input('nip'))->first();

    //     $rules = [
    //         'nip' => 'required',
    //         'jenis_layanan_id' => 'required',
    //     ];

    //     $input = [
    //         'nip' => $request->input('nip'),
    //         'jenis_layanan_id' => $request->input('jenis_layanan_id'),
    //     ];

    //     $messages = [
    //         'required' => '*Kolom :attribute wajib diisi.',
    //     ];

    //     $validator = Validator::make($input, $rules, $messages);
    //     if ($validator->fails()) {
    //         return redirect('/admin/unit-kerja/pengajuan')->withErrors($validator)->withInput();
    //     }

    //     $data = [
    //         'dokumen' => '',
    //         'identitas_id' => $data['identitas_id'],
    //         'status' => 0,
    //         'unit_verif_at' => '',
    //         'bkppd_verif_at' => '',
    //         'unit_verif_by' => $request->input('identitas_id'),
    //         'bkppd_verif_by' => $request->input('identitas_id'),
    //         'jenis_layanan_id' => $request->input('jenis_layanan_id'),
    //     ];

    //     Dokumen::create($data);

    //     return redirect('/admin/unit-kerja/pengajuan')->with('success', 'Pengajuan berhasil ditambahkan');
    // }

    public function pegawaiUnitKerja($data, $dokumen)
    {
        return view('admin.unit-kerja.pegawai', [
            'page' => 'Daftar Pegawai OPD',
            'rowsPegawai' => Verifikasi::select(['identitas.nip', 'identitas.nama', 'verifikasi.verifikasi_id', 'verifikasi.docx_id'])->join("identitas", "identitas.identitas_id", "=", "verifikasi.identitas_id")->where("identitas.unit_kerja_id", "=", auth()->user()->unit_kerja_id)->where("verifikasi.jenis_data", "=", "$dokumen/$data")->filter(request(['search']))->paginate(10)->withQueryString(),
            'opd' => UnitKerja::find(auth()->user()->unit_kerja_id),
            'data' => $data,
            'dokumen' => $dokumen,
        ]);
    }

    public function berkasUmumUnitKerja($verifikasi_id, $docx_id, $dokumen)
    {
        $page = '';
        $query = [];

        if ($dokumen == 'pangkat') {
            $page = 'Data Riwayat Pangkat';
            $query = RiwayatPangkat::select(['identitas.nip', 'identitas.nama', 'riwayat_pangkat.sk_pangkat', 'verifikasi.unit_verif_by'])->join("identitas", "identitas.identitas_id", "=", "riwayat_pangkat.identitas_id")->join("verifikasi", "verifikasi.identitas_id", "=", "riwayat_pangkat.identitas_id")->where("riwayat_pangkat.riwayat_pangkat_id", "=", "$docx_id")->where("verifikasi.jenis_data", "=", "$dokumen/umum")->paginate(10);
        }

        if ($dokumen == 'jabatan') {
            $page = 'Data Riwayat Jabatan';
            $query = RiwayatJabatan::select(['identitas.nip', 'identitas.nama', 'riwayat_jabatan.sk_jabatan', 'riwayat_jabatan.pak', 'verifikasi.unit_verif_by'])->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->join("verifikasi", "verifikasi.identitas_id", "=", "riwayat_jabatan.identitas_id")->where("riwayat_jabatan.riwayat_jabatan_id", "=", "$docx_id")->where("verifikasi.jenis_data", "=", "$dokumen/umum")->paginate(10);
        }

        if ($dokumen == 'identitas') {
            $page = 'Data Identitas';
            $query = Identitas::select(['identitas.nip', 'identitas.nama', 'identitas.foto', 'identitas.karpeg', 'identitas.berkala_terakhir', 'verifikasi.unit_verif_by'])->join("verifikasi", "verifikasi.identitas_id", "=", "identitas.identitas_id")->where("identitas.identitas_id", "=", "$docx_id")->where("verifikasi.jenis_data", "=", "$dokumen/umum")->paginate(10);
        }

        if ($dokumen == 'diklat') {
            $page = 'Data Diklat';
            $query = Diklat::select(['identitas.nip', 'identitas.nama', 'diklat.sertifikat', 'verifikasi.unit_verif_by'])->join("identitas", "identitas.identitas_id", "=", "diklat.identitas_id")->join("verifikasi", "verifikasi.identitas_id", "=", "diklat.identitas_id")->where("diklat.diklat_id", "=", "$docx_id")->where("verifikasi.jenis_data", "=", "$dokumen/umum")->paginate(10);
        }

        return view('admin.unit-kerja.umum.data-' . $dokumen, [
            'page' => $page,
            'rows' => $query,
            'verifikasi_id' => $verifikasi_id,
        ]);
    }

    public function berkasKhususUnitKerja()
    {
        return view('admin.unit-kerja.khusus.data-drh', [
            'page' => 'Data Khusus OPD',
        ]);
    }

    public function verifikasiUnitKerja(Request $request)
    {
        $verifikasi_id = $request->input('verifikasi_id');
        $data = $request->input('data');
        $dokumen = $request->input('dokumen');

        $input = [
            'status' => '3',
            'unit_verif_at' => time(),
            'unit_verif_by' => auth()->user()->identitas_id,
        ];

        Verifikasi::where('verifikasi_id', $verifikasi_id)->update($input);
        return redirect("/admin/unit-kerja/pegawai/$data/$dokumen")->with('success', 'Data berhasil diverifikasi');
    }

    // public function pengajuanUnitKerja()
    // {
    //     return view('admin.unit-kerja.pengajuan', [
    //         'page' => 'Pengajuan OPD',
    //     ]);
    // }

    public function pegawaiBKPPD($data, $dokumen)
    {
        return view('admin.bkppd.pegawai', [
            'page' => 'Daftar Pegawai',
            'rowsPegawai' => Verifikasi::join("identitas", "identitas.identitas_id", "=", "verifikasi.identitas_id")->filter(request(['search']))->paginate(10)->withQueryString(),
            'data' => $data,
            'dokumen' => $dokumen,
        ]);
    }

    public function berkasUmumBKPPD($param1, $param2, $param3)
    {
        $page = '';
        $query = [];

        if ($param3 == 'pangkat') {
            $page = 'Data Riwayat Pangkat';
            $query = RiwayatPangkat::join("identitas", "identitas.identitas_id", "=", "riwayat_pangkat.identitas_id")->join("verifikasi", "verifikasi.identitas_id", "=", "riwayat_pangkat.identitas_id")->where("riwayat_pangkat.riwayat_pangkat_id", "=", "$param2")->paginate(10);
        }

        return view('admin.bkppd.umum.data-' . $param3, [
            'page' => $page,
            'verifikasi_id' => $param1,
            'rows' => $query,
        ]);
    }

    public function berkasKhususBKPPD()
    {
        return view('admin.bkppd.khusus.data-drh', [
            'page' => 'Data Khusus BKPPD',
        ]);
    }

    public function verifikasiBKPPD(Request $request)
    {
        $data = [
            'status' => '2',
            'bkppd_verif_at' => time(),
            'bkppd_verif_by' => auth()->user()->identitas_id,
        ];
        Verifikasi::where('verifikasi_id', $request->input('verifikasi_id'))->update($data);
        return redirect('/admin/bkppd/pegawai/bkppd')->with('success', 'Data berhasil diverifikasi');
    }

    // public function pengajuanBKPPD()
    // {
    //     return view('admin.bkppd.pengajuan', [
    //         'page' => 'Pengajuan BKPPD',
    //     ]);
    // }
}
