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
        public function store(Request $request){

            $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mobile_number' => 'required|string|max:20',
            'email' => 'required|email|unique:members,email',
            'plan' => 'required|string|max:255',
            ]);
            $imageName = time() . '.'. $request -> profile_picture -> extension();
            $request -> profile_picture->storeAs('members', $imageName, 'public');
            $profilePicturePath = "members/".$imageName;
            Member::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'profile_picture' => $profilePicturePath,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'plan' => $request->plan,
            ]);

            return redirect()->route('owner.members')->with('success', 'Member added successfully.');
        }
}
