<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            auth()->logout();
        }

        return back()->withErrors(['email' => 'These credentials do not match our records or you are not an admin.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
