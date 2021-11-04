<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        return view('kecamatan.index', [
            'page' => 'Data Kecamatan',
            "rows" => Kecamatan::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {
        return view('kecamatan.add-form', [
            'page' => 'Tambah Kecamatan',
        ]);
    }

    public function add(Request $request)
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
            return redirect('/kecamatan/add')->withErrors($validator)->withInput();
        }

        Kecamatan::create($input);

        return redirect('/kecamatan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($kecamatan_id)
    {
        return view('kecamatan.update-form', [
            'page' => 'Ubah Kecamatan',
            'data' => Kecamatan::find($kecamatan_id),
        ]);
    }

    public function update(Request $request)
    {
        $kecamatan = Kecamatan::find($request->input('kecamatan_id'));
       
        $nama_kecamatan = $kecamatan['nama_kecamatan'] != $request->input('nama_kecamatan') ? '|unique:kecamatan' : '';
        $rules = [
            'nama_kecamatan' => 'required'.$nama_kecamatan,
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
            return redirect('/kecamatan/update/' . $request->input('kecamatan_id'))->withErrors($validator)->withInput();
        }

        Kecamatan::where('kecamatan_id', $request->input('kecamatan_id'))->update($input);

        return redirect('/kecamatan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        Kecamatan::destroy($request->input('kecamatan_id'));
        return redirect('/kecamatan')->with('success', 'Data berhasil dihapus');
    }
}
