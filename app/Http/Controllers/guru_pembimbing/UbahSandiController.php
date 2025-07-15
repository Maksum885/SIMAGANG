<?php

namespace App\Http\Controllers\guru_pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahSandiController extends Controller
{
    public function editPassword()
    {
        return view('guru.ubah-sandi');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed'
        ]);

        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama tidak cocok.');
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
