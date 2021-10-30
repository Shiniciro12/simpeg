<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use File;

class KelurahanController extends Controller
{
    public function index()
    {
        return view('kelurahan.index', [
            'page' => 'Data Kelurahan',
            "rows" => Kelurahan::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('kelurahan.add-form', [
            'page' => 'Tambah Kelurahan',
        ]);
    }

    public function add(Request $request)
    {

        $rules = [
            'nama_kelurahan' => 'required|unique:kelurahan',
            'kode_pos' => 'required|unique:kelurahan',
        ];

        $input = [
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kode_pos' => $request->input('kode_pos'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kontak :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kelurahan/add')->withErrors($validator)->withInput();
        }

        Kelurahan::create($input);

        return redirect('/kelurahan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($kelurahan_id)
    {
        return view('kelurahan.update-form', [
            'page' => 'Ubah Kelurahan',
            'data' => Kelurahan::find($kelurahan_id),
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_kelurahan' => 'required|unique:kelurahan',
            'kode_pos' => 'required|numeric',
        ];

        $input = [
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'kode_pos' => $request->input('kode_pos'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kontak :attribute sudah terdaftar.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/kelurahan/update/' . $request->input('kelurahan_id'))->withErrors($validator)->withInput();
        }

        Kelurahan::where('kelurahan_id', $request->input('kelurahan_id'))->update($input);

        return redirect('/kelurahan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        Kelurahan::destroy($request->input('kelurahan_id'));
        return redirect('/kelurahan')->with('success', 'Data berhasil dihapus');
    }
}
