<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'page' => 'SIMPEG Login',
        ]);
    }

    public function signIn(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $input = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            if (auth()->user()->active == 0) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('loginError', 'Akun anda sedang tidak aktif!');
            } else {
                if ($request->user()->hasRole('root')) {
                    return redirect('/root/dashboard');
                } else if ($request->user()->hasRole('bkppd')) {
                    return redirect('/bkppd/dashboard');
                } else if ($request->user()->hasRole('unit-kerja')) {
                    return redirect('/unit-kerja/dashboard');
                } else {
                    return redirect('/client/dashboard');
                }
            }
        }

        return redirect('/login')->withErrors($validator)->withInput()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
