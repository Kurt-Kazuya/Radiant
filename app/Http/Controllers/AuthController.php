<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        
    
        $adminEmail    = 'admin@hotel.com';
        $adminPassword = 'password';

        // Only allow fallback check if there are no admins in the system (e.g. database was reset)
        if (User::where('role', 'admin')->count() === 0) {
            if ($credentials['email'] === $adminEmail && $credentials['password'] === $adminPassword) {
                // Re-create the admin row if it was deleted
                $admin = User::firstOrCreate(
                    ['email' => $adminEmail],
                    [
                        'name'     => 'Admin',
                        'password' => Hash::make($adminPassword),
                        'role'     => 'admin',
                    ]
                );

                Auth::login($admin, $request->boolean('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended('/');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }



    //  Logout 

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}