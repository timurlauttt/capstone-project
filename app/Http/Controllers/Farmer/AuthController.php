<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('farmer.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // Find user by email only (no password check)
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('farmer.dashboard'))->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email not found'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'Logout berhasil');
    }
}
