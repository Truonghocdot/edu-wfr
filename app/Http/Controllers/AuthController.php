<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login form for users
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Handle user login
     */
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            \app('flasher')->addSuccess('Logged in successfully.');
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => __('Email or password is incorrect.'),
        ]);
    }

    /**
     * Show registration form for users
     */
    public function register()
    {
        return view('user.createAccount');
    }

    /**
     * Handle user registration
     */
    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'student_id' => 'required|string|max:20|unique:users',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'student_id' => $validated['student_id'],
        ]);

        Auth::login($user);
        \app('flasher')->addSuccess('Registration successful.');
        return redirect()->route('home');
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        \app('flasher')->addSuccess('You have been logged out.');
        return redirect()->route('index');
    }

    /**
     * Show admin login form
     */
    public function adminLogin()
    {
        return view('auth.adminLogin');
    }

    /**
     * Handle admin login
     */
    public function adminLoginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('Email or password is incorrect.'),
            ]);
        }

        if (!$user->isAdmin()) {
            throw ValidationException::withMessages([
                'email' => __('You do not have admin access.'),
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        \app('flasher')->addSuccess('Admin login successful.');
        return redirect()->route('dashboard');
    }
}
