<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOwnersController extends Controller
{
    public function index(){
        if (Auth::check()){
            $owners = User::where("role","owner") -> paginate(10);
            return view("admin.owners",compact("owners")) -> with("page","Gym Owners");
        };
    }
}
