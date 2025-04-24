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
    public function ownerStatus($id){
        if (Auth::check()){
            $owner = User::find($id);
            if ($owner){
                $owner->is_active = !$owner->is_active;
                $owner -> save();
            }
            return redirect() -> back() -> withSuccess("Owner status has changed with success");
        }
    }
    public function search(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'query' => 'nullable|string|max:255',
            ]);
            $query = $request->input('query', '');

            $owners = User::where('role', 'owner')
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', '%' . $query . '%')
                      ->orWhere('email', 'LIKE', '%' . $query . '%');
                })
                ->get();

            return response()->json([
                'success' => true,
                'owners' => $owners,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
        ], 401);
    }
}
