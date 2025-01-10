<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['error' => 'Login gagal atau Anda bukan admin.']);
    }

    public function index()
    {
        return view('admin.dashboard'); // Ganti dengan halaman dashboard admin Anda
    }
}
