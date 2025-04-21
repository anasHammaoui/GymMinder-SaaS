<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

           if(Auth::check()){
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
           return redirect() -> route("unauthorized");
        }
        // delete user
        public function destroy($id)
        {
            if (Auth::check()){
                $member = Member::where('id', $id)->where('user_id', Auth::id())->first();

            if (!$member) {
                return redirect()->route('owner.members')->with('error', 'Member not found or unauthorized.');
            }

            // Delete the member's profile picture from storage
            if ($member->profile_picture && Storage::disk('public')->exists($member->profile_picture)) {
                Storage::disk('public')->delete($member->profile_picture);
            }

            $member->delete();

            return redirect()->route('owner.members')->with('success', 'Member deleted successfully.');
            }
           return redirect() -> route("unauthorized");

        }
}
