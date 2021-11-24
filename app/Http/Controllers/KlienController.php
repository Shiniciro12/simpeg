<?php

namespace App\Http\Controllers;

//use Clockwork\Request\Request;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokumen;
use App\Models\Pendidikan;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPangkat;
use App\Models\Keluarga;
use App\Models\TandaJasa;
use App\Models\Identitas;
use App\Models\DataKhusus;
use App\Models\Verifikasi;
use File;

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
        $data = ([
            'page' => 'Klien | Data Umum',
            'riwayatPangkat' => RiwayatPangkat::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'riwayatPendidikan' => Pendidikan::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'identitas' => Verifikasi::where('identitas_id', auth()->user()->identitas_id)->where('jenis_data', 'identitas/umum')->first(),
            'jabatan' => RiwayatJabatan::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'diklat' => Diklat::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'keluarga' => Keluarga::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'tandaJasa' => TandaJasa::where('identitas_id', auth()->user()->identitas_id)->exists(),
        ]);

        $no = 1;
        foreach ($data as $d => $key) {
            if ($key == '1') {
                $no++;
            }
        }
        $data['jumlah'] = $no;
        return view('klien.data-umum', $data);
    }

    public function checkStatusKhusus($str)
    {
        $data = Dokumen::join('data_khusus', 'dokumen.data_khusus_id', '=', 'data_khusus.data_khusus_id')->where('dokumen.identitas_id', auth()->user()->identitas_id)->where('dokumen.data_khusus_id', '=', $str)->exists();

        if ($data == true) {
            echo "<a class='text-success'><i class='fa fa-check-square f-30'></i></a>";
        } else {
            echo "<a class='text-danger'><i class='fa fa-window-close f-28'></i></a>";
        }
    }

    public function dataKhusus()
    {
        return view('klien.data-khusus', [
            'page' => 'Klien | Data Khusus',
            'dataKhusus' => DataKhusus::get(),
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

    public function gantiGambarIdentitas(Request $request)
    {
        $rules = [
            'foto_profil' => 'file|mimes:png,jpg,jpeg|max:500',
        ];

        $input = [
            'foto_profil' => $request->file('foto_profil'),
        ];

        $messages = [
            'mimes' => '*Format file :attribute tidak didukung.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dashboard')->with('success', 'Data berhasil diubah');
        }

        $extension = $request->file('foto_profil')->getClientOriginalExtension();

        $pathFile =  "/unggah/identitas/foto/" . auth()->user()->nip . "." . $extension;

        $temp = $request->file('foto_profil')->getPathName();
        $folder = "unggah/identitas/foto/" . auth()->user()->nip . "." . $extension;
        move_uploaded_file($temp, $folder);

        $data = [
            'foto' => $pathFile,
        ];

        Identitas::where('identitas_id', auth()->user()->identitas_id)->update($data);
        
        return redirect('/klien/dashboard')->with('success', 'Data berhasil diubah');
    }
}
