<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|min:5',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
        ]);

        $process = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'created_at' => now(),
        ]);

        if ($process) {
            return redirect()->route('home')->with('success', [
                'title' => 'Berhasil Register',
                'message' => 'Selamat datang di aplikasi kami, silahkan login',
            ]);
        } else {
            return redirect()->back()->with('error', [
                'title' => 'Gagal Register',
                'message' => 'Terjadi kesalahan saat register',
            ])->withInput($request->only('email'));
        }
    }

    public function login(Request $request)
    {
        $credential = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', [
                'title' => 'Berhasil Login',
                'message' => 'Selamat datang kembali, ' . auth()->user()->name,
            ]);
        }

        return redirect()->back()->with('error', [
            'title' => 'Gagal Login',
            'message' => 'Email atau password salah',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success', [
            'title' => 'Berhasil Logout',
            'message' => 'Anda telah berhasil logout',
        ]);
    }
}
