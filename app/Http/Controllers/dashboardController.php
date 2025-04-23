<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){
        $user = Auth::user() -> role;
       if ($user === "owner"){
        return view("owner.dashboard") -> with('page','Dashboard');
       } elseif($user === "admin"){
        return 'hello admin';
       }
       return redirect("/unauthorized");
    }
}
