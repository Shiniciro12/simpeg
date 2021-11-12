<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelurahan.index', [
            'page' => 'Data Kelurahan',
            "rows" => Kelurahan::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelurahan.create-form', [
            'page' => 'Tambah Kelurahan',
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
            'nama_kelurahan' => 'required|unique:kelurahan',
            'kode_pos' => 'required|numeric|digits:5|unique:kelurahan',
        ];

        $input = [
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kode_pos' => $request->input('kode_pos'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'digits' => '*Kolom :attribute tidak sesuai.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kelurahan/create')->withErrors($validator)->withInput();
        }

        Kelurahan::create($input);

        return redirect('/kelurahan')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelurahan_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kelurahan_id)
    {
        return view('kelurahan.edit-form', [
            'page' => 'Ubah Kelurahan',
            'data' => Kelurahan::find($kelurahan_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelurahan_id)
    {
        $kelurahan = Kelurahan::find($kelurahan_id);

        $nama_kelurahan = $kelurahan['nama_kelurahan'] != $request->input('nama_kelurahan') ? '|unique:kelurahan' : '';

        $rules = [
            'nama_kelurahan' => 'required' . $nama_kelurahan,
            'kode_pos' => 'required|numeric|digits:5',
        ];

        $input = [
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kode_pos' => $request->input('kode_pos'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'digits' => '*Kolom :attribute tidak sesuai.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kelurahan/' . $kelurahan_id . '/edit')->withErrors($validator)->withInput();
        }

        Kelurahan::where('kelurahan_id', $kelurahan_id)->update($input);

        return redirect('/kelurahan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelurahan_id)
    {
        Kelurahan::destroy($kelurahan_id);
        return redirect('/kelurahan')->with('success', 'Data berhasil dihapus');
    }
}
