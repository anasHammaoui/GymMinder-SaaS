<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
        public function index(){
            if (Auth::check()){
                if(Auth::user() -> is_active){
                    $members = Member::where("user_id", Auth::user()->id)->paginate(5);
                    return view("owner.members",compact("members")) -> with("page","Members");    
                } else{
                    return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
                }
            }
            return redirect("/unauthorized");
        }
        public function store(Request $request){

           if(Auth::check()){
                if(Auth::user() -> is_active){
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
                } else{
                    return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
                }
           }
           return redirect() -> route("unauthorized");
        }
        // delete user
        public function destroy($id)
        {
            if (Auth::check()){
                if(Auth::user() -> is_active){
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
                } else{
                    return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
                }
            }
           return redirect() -> route("unauthorized");

        }
        // update member
        public function update(Request $request, $id)
        {
            if (Auth::check()) {
                if(Auth::user() -> is_active){
                    $member = Member::where('id', $id)->where('user_id', Auth::id())->first();

                if (!$member) {
                    return redirect()->route('owner.members')->with('error', 'Member not found or unauthorized.');
                }

                $request->validate([
                    'name' => 'required|string|max:255',
                    'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'mobile_number' => 'required|string|max:20',
                    'email' => 'required|email|unique:members,email,' . $member->id,
                    'plan' => 'required|string|max:255',
                ]);

                if ($request->hasFile('profile_picture')) {
                    // Delete the old profile picture if it exists
                    if ($member->profile_picture && Storage::disk('public')->exists($member->profile_picture)) {
                        Storage::disk('public')->delete($member->profile_picture);
                    }

                    // Store the new profile picture
                    $imageName = time() . '.' . $request->profile_picture->extension();
                    $request->profile_picture->storeAs('members', $imageName, 'public');
                    $member->profile_picture = "members/" . $imageName;
                }

                // Update member details
                $member->name = $request->name;
                $member->mobile_number = $request->mobile_number;
                $member->email = $request->email;
                $member->plan = $request->plan;
                $member->save();

                return redirect()->route('owner.members')->with('success', 'Member updated successfully.');
                } else{
                    return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
                }
            }

            return redirect()->route("unauthorized");
        }
        public function search(Request $request)
        {
            if (Auth::check()) {
                if(Auth::user() -> is_active){
                    $request->validate([
                        'query' => 'nullable|string|max:255',
                    ]);
                    $query = $request->input('query', '');
        
                    $members = Member::where('user_id', Auth::id())
                        ->where(function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%')
                          ->orWhere('email', 'LIKE', '%' . $query . '%')
                          ->orWhere('mobile_number', 'LIKE', '%' . $query . '%')
                          ->orWhere('plan', 'LIKE', '%' . $query . '%');
                        })
                        ->get();
        
                    return response()->json([
                        'success' => true,
                        'members' => $members,
                    ]);
                } else{
                    return redirect() -> route("subscriptions") ->with("error","Please complete your subscription to access full features");
                }
            }

            return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
            ], 401);
        }

}
