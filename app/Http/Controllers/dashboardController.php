<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\MemberPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){
        $user = Auth::user() -> role;
    if ($user === "owner"){
     $members = Member::where("user_id", Auth::user()->id)->count();
     $payment = MemberPayment::where("user_id", Auth::user()->id)
         ->where('created_at', '>=', now()->subDays(30))
         ->sum('amount');

     $payedMembers = MemberPayment::where("user_id", Auth::user()->id)
         ->where('created_at', '>=', now()->subDays(30))
         ->distinct('member_id')
         ->count('member_id');
     $attendance = Attendance::where("user_id", Auth::user()->id)->count();

    // Get attendance per day for the current and last month
    $attendancePerMonth = collect(['thisMonth' => now()->month, 'lastMonth' => now()->subMonth()->month])
        ->mapWithKeys(function ($month, $key) {
            $attendance = Attendance::selectRaw('DAY(created_at) as day, COUNT(*) as count')
                ->where("user_id", Auth::user()->id)
                ->whereMonth('created_at', $month)
                ->groupBy('day')
                ->orderBy('day')
                ->pluck('count', 'day')
                ->toArray();

            return [$key => array_replace(array_fill(1, 30, 0), $attendance)];
        })
        ->toArray();
    // Get revenue per month and format it for the chart
    $revenuePerMonth = MemberPayment::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
        ->where("user_id", Auth::user()->id)
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

    // Ensure all months are present in the data
    $revenuePerMonth = collect(range(1, 12))->mapWithKeys(function ($month) use ($revenuePerMonth) {
        return [$month => $revenuePerMonth[$month] ?? 0];
    })->toArray();
     return view("owner.dashboard",compact(["members","payment","payedMembers","attendance","attendancePerMonth","revenuePerMonth"])) -> with('page','Dashboard');
       } elseif($user === "admin"){
        return 'hello admin';
       }
       return redirect("/unauthorized");
    }
}
