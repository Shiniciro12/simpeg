<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index', [
        'page' => 'Home',
        "rows" => Identitas::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        ]);
    }
}
