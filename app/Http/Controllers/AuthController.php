<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function signup(){
        return view('auth.signup');
    }

    public function login(){
        return view('auth.login');
    }

    public function signin(Request $request){

        $userValidator = $request->validate([
            'email' =>'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::firstWhere('email' , $userValidator['email']);

        if(!$user){
            return redirect('/auth/login')->with('invalid_email' , 'Invalid Email');
        }

        $isPasswordValid = Hash::check($userValidator['password'] , $user->password);

        if(!$isPasswordValid) return redirect('/auth/login')->with('invalid_password' , 'Invalid password');

        $isAuthenticated = Auth::attempt(['email' => $userValidator['email'] , 'password' => $userValidator['password']]);

        if(!$isAuthenticated)  return redirect('/auth/login')->with('failed_auth' , 'Could not log you in');

        return redirect('/shop/products');
    }

    public function register(Request $request){

        $userValidator = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' =>'required|string|email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create($userValidator);

        return redirect("/auth/login")->with('register' , 'Acoount Created Successfully Login Now!!!!');
       
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/shop/products');
    }
}
