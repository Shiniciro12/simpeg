<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\diklat;
use File;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
        'page' => 'SIMPEG Login',
    ]);
    }
    
}
