<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use File;

class UmumController extends Controller
{
    public function index()
    {
        return view('umum.index', [
            'page' => 'Umum',
        ]);
    }
}