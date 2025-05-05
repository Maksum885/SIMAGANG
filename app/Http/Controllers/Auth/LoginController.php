<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // halaman login kamu
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin/beranda');
            } elseif ($user->role == 'pembimbing-perusahaan') {
                return redirect('/pembimbing-perusahaan/beranda');
            } elseif ($user->role == 'pembimbing-kampus') {
                return redirect('/pembimbing-kampus/beranda');
            } elseif ($user->role == 'mahasiswa') {
                return redirect('/mahasiswa/beranda');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['login' => 'Role tidak dikenali.']);
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Username atau Password salah!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
