<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Session;

class SessionsController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:35',
            'password' => 'required|max:25',
        ]);

        if (Auth::Attempt($validated)) {
            $role = $request->input('role'); // Mengambil nilai role dari form

            // Menyimpan nilai role ke dalam session
            $request->session()->put('role', $role);
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');

            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Invalidasi sesi
        $request->session()->regenerateToken(); // Regenerate CSRF Token

        return redirect()->route('index'); // Redirect ke halaman login setelah logout
    }
}
