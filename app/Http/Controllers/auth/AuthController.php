<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
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
    $role = $users == 0 ? 'admin' : 'owner';
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $role
    ]);
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
    return redirect() -> back() -> withErrors(["user" =>"The provided credentials do not match our records"]);
   }
   public function logout(Request $request){
    Auth::logout();
    $request-> session() -> invalidate();
    $request -> session() -> regenerateToken();
    return redirect() -> route('login') -> withSuccess("You've been logged out");
   }
}
