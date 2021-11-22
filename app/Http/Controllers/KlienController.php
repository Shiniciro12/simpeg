<?php

namespace App\Http\Controllers;

//use Clockwork\Request\Request;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokumen;
use App\Models\JenisLayanan;
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
        // dd(Verifikasi::where('verifikasi.identitas_id', auth()->user()->identitas_id)->join('identitas', 'identitas.identitas_id', '=', 'verifikasi.identitas_id')->get());
        $data = ([
            'page' => 'Klien | Data Umum',
            'riwayatPangkat' => RiwayatPangkat::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'riwayatPendidikan' => Pendidikan::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'jabatan' => RiwayatJabatan::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'diklat' => Diklat::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'keluarga' => Keluarga::where('identitas_id', auth()->user()->identitas_id)->exists(),
            'tandaJasa' => TandaJasa::where('identitas_id', auth()->user()->identitas_id)->exists(),
        ]);
      
        $no = 1;
        foreach($data as $d => $key){
            if($key == '1'){
                $no++;
            }
        }
        $data['jumlah'] = $no;
        return view('klien.data-umum', $data);
    }

    public function checkStatusKhusus($str){
        $data = Dokumen::join('data_khusus', 'dokumen.data_khusus_id', '=', 'data_khusus.data_khusus_id')->where('dokumen.identitas_id', auth()->user()->identitas_id)->where('dokumen.data_khusus_id', '=', $str)->exists();

        if($data == true){
            echo "<a class='text-success'><i class='fa fa-check-square f-30'></i></a>";
        }
        else{
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

    // SATYA LENCANA
    public function gantiGambarIdentitas(Request $request)
    {
        $rules = [
            'foto_profil' => 'file|required|mimes:jpg|max:1000',
        ];

        $input = [
            'foto_profil' => $request->file('foto_profil'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
        ];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dashboard')->with('success', 'Data berhasil diubah');
        }


        $extension = $request->file('foto_profil')->getClientOriginalExtension();

        $newFile =  auth()->user()->identitas_id .".". $extension;

        $temp = $request->file('foto_profil')->getPathName();
        $folder = "unggah/identitas/foto/" . $newFile;
        move_uploaded_file($temp, $folder);

        $data = [
            'identitas_id' => auth()->user()->identitas_id,
            'foto' => $newFile,
        ];

        Identitas::where('identitas_id', auth()->user()->identitas_id)->update($data);
        return redirect('/klien/dashboard')->with('success', 'Data berhasil diubah');
    }
}
