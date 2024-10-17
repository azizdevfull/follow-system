<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FollowedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('register');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {

        // O'qilmagan FollowedNotification larni olish
        $unreadFollowedNotifications = auth()->user()->unreadNotifications->where('type', FollowedNotification::class);

        // O'qilgan FollowedNotification larni olish
        $readFollowedNotifications = auth()->user()->readNotifications->where('type', FollowedNotification::class);

        // Barcha FollowedNotification lar
        $allFollowedNotifications = auth()->user()->notifications->where('type', FollowedNotification::class);

    }

    
    public function dashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function userShow($id)
    {
        $user = User::find($id);
        return view('user-show', compact('user'));
    }

}
