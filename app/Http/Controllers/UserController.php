<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        session()->flash('success', 'Регистрация прошла успешно');
        Auth::login($user);
        return redirect('/');

        dd($request->all());
    }

    public function signup()
    {
        return Inertia::render('Auth/Signup');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            
        ])) {
            session()->flash('success', 'Вы вошли');
            if(Auth::user()->role) {
                return redirect('/');
            } else {
                return redirect('/');
            }
        };

        return redirect()->back()->with('error', 'Ошибка авторизации');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}