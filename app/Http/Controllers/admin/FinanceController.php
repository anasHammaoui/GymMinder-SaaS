<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PlatformPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index(Request $request){
        $validated = $request->validate([
            'filter' => 'nullable|in:all,true,null',
        ]);

        if (Auth::check() && Auth::user()->role === "admin") {
            $filter = $validated['filter'] ?? 'all';

            $query = User::where("role", "owner");

            if ($filter === 'true') {
            $query->whereNotNull("is_active");
            } elseif ($filter === 'null') {
            $query->whereNull("is_active");
            }
            $owners = $query->paginate(5);
            $totalEarning = PlatformPayment::sum("amount");
            $pendingEarning = User::where("role", "owner")->where("is_active", null)->count() * 20;

            return view("admin.finance", compact("owners", "totalEarning", "pendingEarning"))
            ->with("page", "Financial Reports");
        }
        return view("unauthorized");
    }
}
