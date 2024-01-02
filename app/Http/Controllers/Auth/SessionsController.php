<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Session;

class SessionsController extends Controller
{
    public function adminLogin(Request $request)
    {
        
        return view('admin/sessions/create');
    }

    public function doctorLogin(Request $request)
    {
        return view('doctor/sessions/create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'credential' => 'required|max:50',
            'password'    => 'required|max:25',
        ]);

        if ($request->role == 'admin') {
            $model      = 'admin'; 
            $credential = [
                'username' => $request->credential,
                'password' => $request->password,
            ];
        }

        if ($request->role == 'doctor') {
            $model      = 'doctor';
            $credential = [
                'nip'      => $request->credential,
                'password' => $request->password,
            ];
        }

        if (auth()->guard($model)->attempt($credential)) {
            $request->session()->put('role', $request->role);

            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');

            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        if (Session::get('role') == 'doctor') auth()->guard('doctor')->logout(); 
        if (Session::get('role') == 'admin') auth()->guard('admin')->logout();

        $request->session()->invalidate(); // Invalidasi sesi
        $request->session()->regenerateToken(); // Regenerate CSRF Token

        return redirect()->route('index'); // Redirect ke halaman login setelah logout
    }
}
