<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|in:admin,pembimbing_industri,guru_pembimbing,siswa',
        ]);

        // Coba login dengan username & password saja
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            // Verifikasi apakah role sesuai
            if (Auth::user()->role !== $request->role) {
                Auth::logout();
                return back()->with('error', 'Role tidak sesuai.');
            }

            // Redirect berdasarkan role
            return match (Auth::user()->role) {
                'admin' => redirect()->intended('/admin/beranda'),
                'pembimbing_industri' => redirect()->intended('/industri/beranda'),
                'guru_pembimbing' => redirect()->intended('/guru/beranda'),
                'siswa' => redirect()->intended('/siswa/beranda'),
                default => (function () {
                    Auth::logout();
                    return back()->with('error', 'Role tidak dikenali.');
                })()
            };
        }

        // Jika gagal login
        return back()->with('error', 'Username, password, atau role salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
