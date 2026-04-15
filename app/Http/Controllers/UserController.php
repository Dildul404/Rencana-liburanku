<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Http\Attributes\RedirectToRoute;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register () {

        return redirect('/register');
    }

    public function showRegister () {

        return view('register');
    }

    public function showLogin () {
        return view('login');
    }

    public function store (Request $request) {
        
        // Ambil data
        $data = $request->all();

        // Cek apakah email sudah ada
        $email = User::where('email', $data['email'])->first();

        if($email) {
          return redirect('/register')->with('added_email', 'Email sudah terdaftar');
        }

        // Simpan data
        User::create($data);

        // Masuk ke login
        return redirect('/login');
    }

    public function auth (Request $request) {

        // Validasi
        $validate = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$validate) {
            return redirect('/login')->with('canceled', 'Akun tidak ditemukan');
        }

        return redirect('/home')->with('sucsess', 'Login berhasil!');
    }

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
