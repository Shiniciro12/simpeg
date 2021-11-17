<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Identitas;
use App\Models\JenisLayanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UnitKerja;

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

    public function pengajuan()
    {
        return view('admin.unit-kerja.pengajuan', [
            'page' => 'Data Pengajuan',
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsJenisLayanan' => JenisLayanan::latest()->get(),
            "rows" => Dokumen::join("identitas", "identitas.identitas_id", "=", "dokumen.identitas_id")->join("riwayat_pangkat", "riwayat_pangkat.identitas_id", "=", "dokumen.identitas_id")->join("riwayat_jabatan", "riwayat_jabatan.identitas_id", "=", "dokumen.identitas_id")->join("jenis_layanan", "jenis_layanan.jenis_layanan_id", "=", "dokumen.jenis_layanan_id")->where("identitas.unit_kerja_id", "=", auth()->user()->unit_kerja_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function verifikasi(Request $request)
    {
        $data = [
            'status' => '3',
            'unit_verif_at' => time(),
            'unit_verif_by' => auth()->user()->identitas_id,
        ];
        Dokumen::where('dokumen_id', $request->input('dokumen_id'))->update($data);
        return redirect('/admin/unit-kerja/pengajuan')->with('success', 'Data berhasil diverifikasi');
    }

    public function requestLayanan(Request $request)
    {
        $data = Identitas::where('nip', $request->input('nip'))->first();

        $rules = [
            'nip' => 'required',
            'jenis_layanan_id' => 'required',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'jenis_layanan_id' => $request->input('jenis_layanan_id'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/unit-kerja/pengajuan')->withErrors($validator)->withInput();
        }

        $data = [
            'dokumen' => '',
            'identitas_id' => $data['identitas_id'],
            'status' => 0,
            'unit_verif_at' => '',
            'bkppd_verif_at' => '',
            'unit_verif_by' => $request->input('identitas_id'),
            'bkppd_verif_by' => $request->input('identitas_id'),
            'jenis_layanan_id' => $request->input('jenis_layanan_id'),
        ];

        Dokumen::create($data);

        return redirect('/admin/unit-kerja/pengajuan')->with('success', 'Pengajuan berhasil ditambahkan');
    }
}
