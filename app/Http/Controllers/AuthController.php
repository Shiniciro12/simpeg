<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('umum.login.index', [
            'page' => 'SIMPEG Login',
        ]);
    }

    public function signIn(Request $request)
    {
        $rules = [
            'nip' => 'required|numeric|digits:18',
            'password' => 'required'
        ];

        $input = [
            'nip' => $request->input('nip'),
            'password' => $request->input('password')
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'digits' => '*Kolom :attribute tidak sesuai.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            if (auth()->user()->role_id == 4) {
                return redirect('/klien/dashboard');
            } else {
                return redirect('/admin/dashboard');
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
