<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'name' => ['required', 'string'],
        ]);
        
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){
            Auth::login($user);
            return redirect(route('privada'));
        }else{
            return redirect(route('registro'));
        }

    }

    public function login(Request $request)
    {        
        $user = User::where('email', $request->email)->get();

        $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);
        $remember = ($request->has('remember')?true:false);

        //Validacion
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            //"active" => true
        ];
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('privada'));
        }else{
            return redirect('login');
        }

        if(count($user)>0){
            throw validationException::withMessages([
                'password' => __('auth.password')
            ]);
        }
        else{
            throw validationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
