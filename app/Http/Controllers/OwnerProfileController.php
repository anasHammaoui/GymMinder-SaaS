<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class OwnerProfileController extends Controller
{
    /**
     * Display the profile settings page.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view("owner.profile", [
                "page" => "Profile",
                "user" => $user,
            ]);
        }

        return redirect()->route('login');
    }

    /**
     * Update the profile settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'gender' => 'nullable|in:male,female',
            'country' => 'nullable|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->country = $request->input('country');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::delete($user->profile_pic);
            }
            $imageName = time() . '.' . $request->file('profile_pic')->extension();
            $request->file('profile_pic')->storeAs('profile_pics', $imageName, 'public');
            $user->profile_pic = "profile_pics/" . $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user account.
     */
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_pic) {
            Storage::delete($user->profile_pic);
        }

        $user->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
