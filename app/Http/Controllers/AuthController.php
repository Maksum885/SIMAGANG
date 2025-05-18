<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

            // Redirect berdasarkan role
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
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.beranda');
        } elseif (Auth::user()->role === 'mahasiswa') {
            return redirect()->route('mahasiswa.beranda');
        } elseif (Auth::user()->role === 'pembimbing_perusahaan') {
            return redirect()->route('pp.beranda');
        } elseif (Auth::user()->role === 'pembimbing_kampus') {
            return redirect()->route('pk.beranda');
        }
        
        return redirect('/');
    }
}