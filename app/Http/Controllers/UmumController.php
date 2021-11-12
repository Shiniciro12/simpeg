<?php

namespace App\Http\Controllers;

class UmumController extends Controller
{
    public function index()
    {
        return view('umum.beranda.index', [
            'page' => 'Umum',
        ]);
    }
}