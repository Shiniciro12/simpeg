<?php

namespace App\Http\Controllers;

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

    public function indexLayanan ()
    {
        return view('klien.layanan.index', [
            'page' => 'Klien | Layanan'
        ]);
    }

    public function indexLayananDua ()
    {
        return view('klien.layanan.index2', [
            'page' => 'Klien | Layanan2'
        ]);
    }

    public function indexLayananForm1 ()
    {
        return view('klien.layanan.form1', [
            'page' => 'Layanan | Form1'
        ]);
    }

    public function indexListSurat ()
    {
        return view('klien.layanan.list-surat', [
            'page' => 'Layanan | Template Surat'
        ]);
    }

}