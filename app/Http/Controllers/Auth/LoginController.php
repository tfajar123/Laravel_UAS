<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tab;
use App\Models\Guitar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('homeIndex')->withSuccess('You have successfully registered & logged in!');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'You provided credentials do not match in out records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            if(Auth::user()->roles === 'admin') {
                return view('auth.dashboard', [
                    'tabs' => Tab::latest()->paginate(5),
                    'guitars' => Guitar::latest()->paginate(5)
                ]);
            }
            else {
                return redirect()->route('homeIndex');
            }
        }
        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function tab() : View
    {
        return view('auth.tab', [
            'tabs' => Tab::latest()->paginate(10)
        ]);
    }
    public function guitar() : View
    {
        return view('auth.guitar', [
            'guitars' => Guitar::latest()->paginate(10)
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }
}
