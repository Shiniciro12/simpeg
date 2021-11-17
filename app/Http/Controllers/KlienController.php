<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Clockwork\Request\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokumen;

class KlienController extends Controller
{
    public function dashboard()
    {
        return view('klien.dashboard', [
            'page' => 'Klien | Dashboard',
        ]);
    }

    public function dataUmum()
    {
        return view('klien.data-umum', [
            'page' => 'Klien | Data Umum',
        ]);
    }

    public function dataKhusus()
    {
        return view('klien.data-khusus', [
            'page' => 'Klien | Data Khusus',
        ]);
    }

    public function dataKhususLayanan()
    {
        return view('klien.layanan.index', [
            'page' => 'Klien | Layanan'
        ]);
    }

    public function indexLayanan2()
    {
        return view('klien.layanan.index2', [
            'page' => 'Klien | Layanan2'
        ]);
    }

    public function satyaLencanaForm()
    {
        return view('klien.layanan.satyalencana-form', [
            'page' => 'Layanan | Satya Lencana'
        ]);
    }
    public function satyaLencanaAdd(Request $request)
    {
        $rules = [
            'surat_permohonan' => 'file|mimes:pdf|max:500',
            'sktp' => 'file|mimes:pdf|max:500',
            'drh' => 'file|mimes:pdf|max:500',
            'fcskp' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'surat_permohonan' => $request->file('surat_permohonan'),
            'sktp' => $request->file('sktp'),
            'drh' => $request->file('drh'),
            'fcskp' => $request->file('fcskp'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/satyalencana')->withErrors($validator)->withInput();
        }

        $data = [
            'surat_permohonan' => $request->file('surat_permohonan')->getPathName(),
            'sktp' => $request->file('sktp')->getPathName(),
            'drh' => $request->file('drh')->getPathName(),
            'fcskp' => $request->file('fcskp')->getPathName(),
        ];


        //dd(auth()->user()->identitas_id);
        //Looping buat upload itu barang (skrg tengah malem, ngantuk anjer, harus up form per form le, hadeh)
        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "upload/dokumen-khusus/" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }

        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }
    public function indexLayananForm2()
    {
        return view('klien.layanan.form2', [
            'page' => 'Layanan | Form1'
        ]);
    }

    public function indexListSurat()
    {
        return view('klien.layanan.list-surat', [
            'page' => 'Layanan | Template Surat'
        ]);
    }
}
