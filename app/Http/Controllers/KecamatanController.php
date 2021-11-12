<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kecamatan.index', [
            'page' => 'Data Kecamatan',
            "rows" => Kecamatan::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatan.create-form', [
            'page' => 'Tambah Kecamatan',
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
            'nama_kecamatan' => 'required|unique:kecamatan',
        ];

        $input = [
            'nama_kecamatan' => $request->input('nama_kecamatan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kecamatan/create')->withErrors($validator)->withInput();
        }

        Kecamatan::create($input);

        return redirect('/kecamatan')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kecamatan_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kecamatan_id)
    {
        return view('kecamatan.edit-form', [
            'page' => 'Ubah Kecamatan',
            'data' => Kecamatan::find($kecamatan_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kecamatan_id)
    {
        $kecamatan = Kecamatan::find($kecamatan_id);

        $nama_kecamatan = $kecamatan['nama_kecamatan'] != $request->input('nama_kecamatan') ? '|unique:kecamatan' : '';
        $rules = [
            'nama_kecamatan' => 'required' . $nama_kecamatan,
        ];

        $input = [
            'nama_kecamatan' => $request->input('nama_kecamatan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kecamatan/' . $kecamatan_id . '/edit')->withErrors($validator)->withInput();
        }

        Kecamatan::where('kecamatan_id', $kecamatan_id)->update($input);

        return redirect('/kecamatan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kecamatan_id)
    {
        Kecamatan::destroy($kecamatan_id);
        return redirect('/kecamatan')->with('success', 'Data berhasil dihapus');
    }
}
