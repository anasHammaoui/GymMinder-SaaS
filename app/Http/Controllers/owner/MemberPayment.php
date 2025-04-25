<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberPayment as ModelsMemberPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberPayment extends Controller
{
    public function pay(Request $request,$id){
        if(Auth::check()){
            if(Auth::user() -> is_active){
                $validate = $request->validate([
                    "amount" => "required|integer|min:0",
                    "payment_method" => "required|string"
                ]);
                $member = Member::where('id', $id)->where('user_id', Auth::id())->first();
                    if (!$member) {
                        return redirect()->route('owner.members')->with('error', 'Member not found or unauthorized.');
                    }
                ModelsMemberPayment::create([
                    'amount' => $validate["amount"],
                    'payment_method' => $validate["payment_method"],
                    'user_id' => Auth::id(),
                    'member_id' => $member->id,
                ]);
                return redirect() -> back() -> withSuccess("Member paid with success");
            } else{
                return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
            }
        }
        return redirect() -> route('login') -> withErrors(["you have to sign in first"]);
    }
}
