<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $i = RiwayatJabatan::select("identitas.nama", "jabatan.eselon")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->where('jabatan.eselon', 'LIKE', 'I/%')->count();
        $ii = RiwayatJabatan::select("identitas.nama", "jabatan.eselon")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->where('jabatan.eselon', 'LIKE', 'II/%')->count();
        $iii = RiwayatJabatan::select("identitas.nama", "jabatan.eselon")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->where('jabatan.eselon', 'LIKE', 'III/%')->count();
        $iv = RiwayatJabatan::select("identitas.nama", "jabatan.eselon")->join("jabatan", "jabatan.jabatan_id", "=", "riwayat_jabatan.jabatan_id")->join("identitas", "identitas.identitas_id", "=", "riwayat_jabatan.identitas_id")->where('jabatan.eselon', 'LIKE', 'IV/%')->count();

        //dd($iii);
        return view('home.index', [
            'page' => 'Dashboard',
            'dataGenderMale' => Identitas::where('jenis_kelamin', 'L')->count(),
            'dataGenderFemale' => Identitas::where('jenis_kelamin', 'P')->count(),
            'dataLesserThan30' => Identitas::select("nama")->where(DB::raw("date_part('year', age(tgl_lahir))"), '<', 30)->count(),
            'dataMoreThan50' => Identitas::select("nama")->where(DB::raw("date_part('year', age(tgl_lahir))"), '>', 50)->count(),
            'dataAge3040' => Identitas::select("nama")->where([[DB::raw("date_part('year', age(tgl_lahir))"), '>', 30], [DB::raw("date_part('year', age(tgl_lahir))"), '<', 40]])->count(),
            'dataAge4050' => Identitas::select("nama")->where([[DB::raw("date_part('year', age(tgl_lahir))"), '>', 40], [DB::raw("date_part('year', age(tgl_lahir))"), '<', 50]])->count(),
            'eselon1' => $i,
            'eselon2' => $ii,
            'eselon3' => $iii,
            'eselon4' => $iv,
        ]);
    }
}
