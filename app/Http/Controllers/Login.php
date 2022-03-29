<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as PasswordRules;


class Login extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


//        if (Auth::attempt($credentials) && ! Auth::user()->is_admin) {
//            return redirect()->intended(route('users.index'));
//        } elseif (Auth::attempt($credentials) && Auth::user()->is_admin){
//            return redirect(route('dashboard'));
//        }
//
//        return redirect(route('auth.login'));


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('users.index'));
        }

        return back()->withErrors([
            'email' => 'Email or Password incorrect',
        ]);
    }
    public function register ()
    {
        return view('auth.register');
    }
    public function registration (Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:191',
            ],
            'email' => [
                'required',
                'email',
                'max:191',
                'unique:users',
            ],
            'password' => [
                'required',
                'max:191',
                'confirmed',
                PasswordRules::min(4)
                    -> letters()
                    ->uncompromised(),
            ],
            'avatar_url' => [
                'required',
                'max:191',
                'url',
            ],
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect(route('users.index'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function dashboard()
    {
        return view('dashboard', ['users' => User::all()]);
    }
}
