<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showSignUp(){
        if(Auth::check()){
            return redirect()->intended('/dashboard');
        }
        return view('auth.register');
    }
    public function showFormLogin(){
        if(Auth::check()){
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'number_phone' => ['required', 'string', 'max:20'],
            'password' => ['required','string','min:8', 'confirmed'],
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'email or password is wrong',
        ])->onlyInput('email');
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'number_phone' => ['required', 'string', 'max:20'],
            'password' => ['required','string','min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Mail::to($user->email)->send(new WelcomeEmail($user));
        
        return redirect()->route('login')->with('success', 'Inscription réussie. Veuillez vérifier votre email.');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }
}