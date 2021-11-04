<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UnitKerja;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan.index', [
            'page' => 'Data Jabatan',
            "rows" => Jabatan::select(['unit_kerja.nama_unit', 'jabatan.*'])->join("unit_kerja", "unit_kerja.unit_kerja_id", "=", "jabatan.unit_kerja_id")->latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function addForm()
    {
        return view('jabatan.add-form', [
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'page' => 'Admin | Tambah Jabatan',
        ]);
    }

    public function add(Request $request)
    {
        $rules = [
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'kelas' => 'required',
            'unit_kerja_id' => 'required',
            'jenis_jabatan' => 'required',
        ];

        $input = [
            'nama_jabatan' => $request->input('nama'),
            'eselon' => $request->input('eselon'),
            'kelas' => $request->input('kelas'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'jenis_jabatan' => $request->input('jenis_jabatan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/jabatan/add')->withErrors($validator)->withInput();
        }

        $data = [
            'nama_jabatan' => $request->input('nama'),
            'eselon' => $request->input('eselon'),
            'kelas' => $request->input('kelas'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'jenis_jabatan' => $request->input('jenis_jabatan')
        ];

        Jabatan::create($data);

        return redirect('/jabatan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($jabatan_id)
    {

        return view('jabatan.update-form', [
            'page' => 'Ubah Data Jabatan',
            'rowsUnitKerja' => UnitKerja::latest()->get(),
            'rowJabatan' => Jabatan::where('jabatan_id', $jabatan_id)->first()
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'kelas' => 'required',
            'unit_kerja_id' => 'required',
            'jenis_jabatan' => 'required',
        ];

        $input = [
            'nama_jabatan' => $request->input('nama_jabatan'),
            'eselon' => $request->input('eselon'),
            'kelas' => $request->input('kelas'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'jenis_jabatan' => $request->input('jenis_jabatan'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/jabatan/update/'.$request->input('jabatan_id'))->withErrors($validator)->withInput();
        }

        $data = [
            'nama_jabatan' => $request->input('nama_jabatan'),
            'eselon' => $request->input('eselon'),
            'kelas' => $request->input('kelas'),
            'unit_kerja_id' => $request->input('unit_kerja_id'),
            'jenis_jabatan' => $request->input('jenis_jabatan')
        ];

        Jabatan::where('jabatan_id', $request->input('jabatan_id'))->update($data);
        return redirect('/jabatan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        Jabatan::destroy($request->input('jabatan_id'));
        return redirect('/jabatan')->with('success', 'Data berhasil diubah');
    }
}
