<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\diklat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'page' => 'Index1',
            "rows" => Identitas::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        ]);
    }

    public function index2()
    {
        return view('home.index2', [
            'page' => 'Index2',
            "rows" => Identitas::latest()->get(),
        ]);
    }
}
