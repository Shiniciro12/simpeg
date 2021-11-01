<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'page' => 'Dashboard',
            'dataGenderMale' => Identitas::where('jenis_kelamin', 'L')->count(),
            'dataGenderFemale' => Identitas::where('jenis_kelamin', 'P')->count(),
        ]);
    }
}
