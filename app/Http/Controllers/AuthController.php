<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register
    public function showRegister(){
        return view('auth.signUp');
    }
   public function register(Request $request){
    $request -> validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
    $users = User::count();
    $user = null;
        if ($users == 0){
            $user = User::create([
                'name' => $request-> name,
                'email' => $request-> email,
                'password' => Hash::make($request-> password),
                "role" => "admin"
            ]);
        } else {
            $user = User::create([
               'name' => $request-> name,
                'email' => $request-> email,
                'password' => Hash::make($request-> password),
                "role" => "owner"
            ]);
        }
        $user->sendEmailVerificationNotification();
    Auth::login($user);
    return redirect()-> route('verification.notice');
   }
//    login 
    public function showLogin(){
        return view('auth.login');
    }
   public function login(Request $request){
   $data =  $request -> validate([
        "email" => "required|email",
        "password" => "required|string"
    ]);
    if (Auth::attempt($data)){
        $request -> session() -> regenerate();
        return redirect()->intended('/dashboard');
    }
   }
   public function logout(Request $request){
    Auth::logout();
    $request-> session() -> invalidate();
    $request -> session() -> regenerateToken();
    return redirect() -> route('login') -> withSuccess("You've been logged out");
   }
}
