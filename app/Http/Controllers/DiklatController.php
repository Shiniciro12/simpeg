<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\Diklat;
use App\Models\Verifikasi;
use File;


class DiklatController extends Controller
{
    public function index()
    {
        return view('diklat.index', [
            'page' => 'Data Diklat',
            "rows" => Diklat::select('diklat.*', 'identitas.nama AS nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'diklat.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {
        return view('diklat.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Diklat',
        ]);
    }

    public function add(Request $request)
    {
        $data = Identitas::where('nip', $request->input('nip'))->first();

        $rules = [
            'identitas_id' => 'required',
            'status' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'penyelenggara' => 'required',
            'angka' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jam' => 'required|numeric',
            'no_sttp' => 'required|unique:diklat',
            'tgl_sttp' => 'required|date',
            'sertifikat' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => $data['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'date' => '*Kolom :attribute tidak valid.',
            'after' => '*Kolom :attribute tidak sesuai.',
            'mimes' => '*File format tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/diklat/add')->withErrors($validator)->withInput();
        }
        $temp = $request->file('sertifikat')->getPathName();
        $file = $data['identitas_id'] . "-diklat-" . time();

        $folder = "unggah/sertifikat-diklat/" . $file . ".pdf";
        move_uploaded_file($temp, $folder);

        $name = '/unggah/sertifikat-diklat/' . $file . '.pdf';

        $data = [
            'identitas_id' => $data['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $name,
        ];

        Diklat::create($data);

        return redirect('/diklat')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Diklat::where('diklat_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('diklat.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsDiklat' => $ambil_data,
            'page' => 'Tambah Diklat',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {

        $diklat = Diklat::find($request->input('diklat_id'));
        $sertifikat = $request->file('sertifikat') ? 'file|mimes:pdf|max:500' : '';
        $no_sttp = $diklat['no_sttp'] != $request->input('no_sttp') ? '|unique:diklat' : '';

        $rules = [
            'identitas_id' => 'required',
            'status' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'penyelenggara' => 'required',
            'angka' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jam' => 'required|numeric',
            'no_sttp' => 'required' . $no_sttp,
            'tgl_sttp' => 'required ',
            'sertifikat' => '' . $sertifikat,
        ];

        $input = [
            'identitas_id' => $diklat['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'date' => '*Kolom :attribute tidak valid.',
            'mimes' => '*File format tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/diklat/update/' . $request->input('diklat_id'))->withErrors($validator)->withInput();
        }
        $pathdiklat = $diklat['sertifikat'];

        if ($request->file('sertifikat')) {
            File::delete(public_path($pathdiklat));
            $extdiklat = $request->file('sertifikat')->getClientOriginalExtension();
            $cum = explode("/", $pathdiklat);
            $newFilediklat = end($cum);
            $tempdiklat = $request->file('sertifikat')->getPathName();
            $folderdiklat = "unggah/sertifikat-diklat/" . $newFilediklat;
            move_uploaded_file($tempdiklat, $folderdiklat);
            $pathdiklat = "/unggah/sertifikat-diklat/" . $newFilediklat;
        }

        $data = [
            'identitas_id' => $diklat['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->input('sertifikat'),
        ];

        Diklat::where('diklat_id', $request->input('diklat_id'))->update($data);

        return redirect('/diklat')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $diklat = Diklat::where('diklat_id', $request->input('diklat_id'))->first();

        File::delete(public_path($diklat['sertifikat']));
        Diklat::destroy($request->input('diklat_id'));
        return redirect('/diklat')->with('success', 'Data berhasil dihapus');
    }

    //umum view
    public function UmumView()
    {
        return view('klien.form-umum.riwayat-diklat.index', [
            'page' => 'Data Diklat',
            "rows" => Diklat::select(['diklat.nama', 'diklat.status', 'diklat.tempat', 'diklat.penyelenggara', 'diklat.angka', 'diklat.tgl_mulai', 'diklat.tgl_selesai', 'diklat.jam', 'diklat.no_sttp', 'diklat.tgl_sttp', 'diklat.sertifikat', 'diklat.created_at', 'verifikasi.status'])->join('identitas', 'identitas.identitas_id', '=', 'diklat.identitas_id')->join("verifikasi", "verifikasi.docx_id", "=", "diklat.diklat_id")->latest()->where('diklat.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    //umum add form
    public function UaddForm()
    {
        return view('klien.form-umum.riwayat-diklat.add', [
            'page' => 'Tambah Diklat',
        ]);
    }

    // umum store
    public function UStore(Request $request)
    {
        $data = Identitas::where('identitas_id', auth()->user()->identitas_id)->first();

        $rules = [
            'identitas_id' => 'required',
            'status' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'penyelenggara' => 'required',
            'angka' => '',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jam' => 'numeric',
            'no_sttp' => 'required|unique:diklat',
            'tgl_sttp' => 'required|date',
            'sertifikat' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => $data['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $request->file('sertifikat'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'date' => '*Kolom :attribute tidak valid.',
            'after' => '*Kolom :attribute tidak sesuai.',
            'mimes' => '*File format tidak didukung.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dataumum/diklat/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sertifikat')->getPathName();
        $file = $data['identitas_id'] . "-diklat-" . time();

        $folder = "unggah/sertifikat-diklat/" . $file . ".pdf";
        move_uploaded_file($temp, $folder);

        $name = '/unggah/sertifikat-diklat/' . $file . '.pdf';

        $data = [
            'identitas_id' => $data['identitas_id'],
            'status' => $request->input('status'),
            'nama' => $request->input('nama'),
            'tempat' => $request->input('tempat'),
            'penyelenggara' => $request->input('penyelenggara'),
            'angka' => $request->input('angka'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_selesai' => $request->input('tgl_selesai'),
            'jam' => $request->input('jam'),
            'no_sttp' => $request->input('no_sttp'),
            'tgl_sttp' => $request->input('tgl_sttp'),
            'sertifikat' => $name,
        ];

        $resultCreateDiklat = Diklat::create($data)->getAttributes();

        $dataVerifikasi = [
            'docx_id' => $resultCreateDiklat['diklat_id'],
            'identitas_id' => auth()->user()->identitas_id,
            'status' => '4',
            'unit_verif_at' => '', 
            'bkkpd_verif_at' => '',
            'unit_verif_by' => '',
            'bkkpd_verif_by' => '',
            'jenis_data' => 'diklat/umum',
        ];

        Verifikasi::create($dataVerifikasi);

        return redirect('/klien/dataumum/diklat')->with('success', 'Data berhasil ditambahkan');
    }
}
