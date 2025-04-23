<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(){
        if (Auth::check()){
            if (Auth::check()){
                $members = Member::where("user_id", Auth::user()->id)->paginate(5);
                return view("owner.attendance",compact("members")) -> with("page","Attendance");
            }
            return redirect("/unauthorized");
        }
    }
    public function markAttendance(Request $request,$id){
        if (Auth::check()){
            $request->validate([
                'ispresent' => 'required|string',
            ]);
            Attendance::create([
                'user_id' => Auth::user()->id,
                'member_id' => $id,
                'is_present' => $request["ispresent"] === 'present',
                'attendance_date' => now(),
            ]);
            return redirect()->route('attendance')->with('success', 'Attendance marked with success.');
        }
        return redirect("/unauthorized");
    }
    public function attendanceCalendar($memberId)
    {
        if (Auth::check()) {
            $attendance = Attendance::where('user_id', Auth::user()->id)
                ->where('member_id', $memberId)
                ->get(['attendance_date', 'is_present']);

            $calendarData = $attendance->map(function ($record) {
                return [
                    'date' => $record->attendance_date->toDateString(),
                    'is_present' => $record->is_present,
                ];
            });

            return response()->json($calendarData);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

}
