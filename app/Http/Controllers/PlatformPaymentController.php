<?php

namespace App\Http\Controllers;

use App\Models\PlatformPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformPaymentController extends Controller
{
    public function index(){
        if (Auth::check()){
            $history = PlatformPayment::where("user_id", Auth::user()->id)->paginate(5);
            return view("owner.subscriptions", compact('history'))->with("page", "Subscriptions");
        }
    }
}
