<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
        public function index(){
            if (Auth::check()){
                $members = Member::where("user_id", Auth::user()->id)->paginate(1);
                return view("owner.members",compact("members")) -> with("page","Members");
            }
            return redirect("/unauthorized");
        }
}
