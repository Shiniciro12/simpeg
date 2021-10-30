<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UnitKerja;

use File;

class UnitKerjaController extends Controller
{
    public function index()
    {
        return view('unit-kerja.index', [
            'page' => 'Data Unit Kerja',
            "rows" => UnitKerja::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {

        return view('unit-kerja.add-form', [
            'page' => 'Tambah Unit Kerja',
        ]);
    }

    public function add(Request $request)
    {

        $rules = [
            'nama_unit' => 'required|unique:unit_kerja',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $input = [
            'nama_unit' => $request->input('nama_unit'),
            'alamat' => $request->input('alamat'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kontak :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/unit-kerja/add')->withErrors($validator)->withInput();
        }

        UnitKerja::create($input);

        return redirect('/unit-kerja')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($unit_kerja_id)
    {
        return view('unit-kerja.update-form', [
            'page' => 'Ubah Unit Kerja',
            'data' => UnitKerja::find($unit_kerja_id),
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_unit' => 'required|unique:unit_kerja',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $input = [
            'nama_unit' => $request->input('nama_unit'),
            'alamat' => $request->input('alamat'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kontak :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/unit-kerja/update/'.$request->input('unit_kerja_id'))->withErrors($validator)->withInput();
        }

        UnitKerja::where('unit_kerja_id', $request->input('unit_kerja_id'))->update($input);

        return redirect('/unit-kerja')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        UnitKerja::destroy($request->input('unit_kerja_id'));
        return redirect('/unit-kerja')->with('success', 'Data berhasil dihapus');
    }
}