<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Pangkat;
use App\Models\Jabatan;

class PangkatController extends Controller
{
    public function index3()
    {
        return view('pangkat.index', [
            'page' => 'Data Pangkat',
            "rows" => Pangkat::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        ]);
    }

    public function addForm3()
    {
        return view('pangkat.add-form-pangkat', [
            'rowsPangkat' => Pangkat::latest()->get(),
            'rowsJabatan' => jabatan::latest()->get(),
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowsKelurahan' => Kelurahan::latest()->get(),
            'rowsKecamatan' => Kecamatan::latest()->get(),
            'page' => 'Tambah Pangkat',
        ]);
    }

    public function add3(Request $request)
    {
        $rules = [
            'pangkat' => 'required|unique:pangkat',
            'golongan' => 'required|unique:pangkat',
        ];

        $input = [
            'pangkat' => $request->input('pangkat'),
            'golongan' => $request->input('golongan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/pangkat/add')->withErrors($validator)->withInput();
        }

        $data = [
            'pangkat' => $request->input('pangkat'),
            'golongan' => $request->input('golongan'),
        ];

        Pangkat::create($data);

        return redirect('/pangkat')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $data = Pangkat::where('pangkat_id', $request->input('pangkat_id'))->first();

        $pangkat = $data['pangkat'] != $request->input('pangkat') ? '|unique:pangkat' : '';
        $golongan = $data['golongan'] != $request->input('golongan') ? '|unique:pangkat' : '';


        $rules = [
            'pangkat' => 'required' . $pangkat,
            'golongan' => 'required' . $golongan,
        ];

        $input = [
            'pangkat' => $request->input('pangkat'),
            'golongan' => $request->input('golongan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/pangkat/update/' . $request->input('pangkat_id'))->withErrors($validator)->withInput();
        }

        Pangkat::where('pangkat_id', $request->input('pangkat_id'))->update($input);

        return redirect('/pangkat')->with('success', 'Data berhasil diubah');
    }

    public function updateForm3($pangkat_id)
    {
        return view('pangkat.update-form-pangkat', [
            'page' => 'Ubah Pangkat',
            'data' => Pangkat::find($pangkat_id),
        ]);
    }

    public function delete(Request $request)
    {
        Pangkat::destroy($request->input('pangkat_id'));
        return redirect('/pangkat')->with('success', 'Data berhasil dihapus');
    }
}
