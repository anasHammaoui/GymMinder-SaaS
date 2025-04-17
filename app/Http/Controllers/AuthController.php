<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request){
    $request -> validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
    $users = User::count();
    // dd($users);
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
        // $user->sendEmailVerificationNotification();
    Auth::login($user);
    return redirect()-> route('dashboard') -> withSuccess("You've been registred with success");
   }
   
}
