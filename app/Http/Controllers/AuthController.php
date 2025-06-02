<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole();
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak sesuai dengan catatan kami.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    protected function redirectBasedOnRole()
    {
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.beranda'),
            'mahasiswa' => redirect()->route('mahasiswa.beranda'),
            'pembimbing_kampus' => redirect()->route('pk.beranda'),
            'pembimbing_perusahaan' => redirect()->route('pp.beranda'),
            default => redirect('/'),
        };
    }
}
