<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function notice(){
        return view('auth.verify-email');
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect() -> route("dashboard") -> withSuccess("Email verified with success");
    }
    public function resend(Request $request){
        if ($request -> user() -> hasVerfiedEmail()){
            return redirect() -> route("dashboard") -> withSuccess("Email already verified");
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
