<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController
{
    // Login
    public function login(Request $request)
    {
        $request->validate([
        'username'=>'required',
        'password'=>'required'
        ]);

     $credentials = $request->only('username','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success','Login berhasil!!');
            }

            if ($user->role === 'siswa') {
                return redirect()->route('siswa.dashboard')->with('success','Login berhasil!');
            }

            Auth::logout();
                return back()->with('error', 'Role Tidak Dikenali.');
        }

        return back()->with('error','Username atau Password salah');
    }

    //Dashboard Admin
    public function adminDashboard()
    {
        $aspirasi = Aspirasi::with(['siswa','kategori','feedback'])->get();
        return view('admin.dashboard',compact('aspirasi'));
    }

    //Dashboard Siswa
    public function siswaDashboard()
    {
        $aspirasi = Aspirasi::with(['kategori','feedback'])->where('siswa_id',Auth::id())->get();
        return view('siswa.dashboard',compact('aspirasi'));
    }
}
