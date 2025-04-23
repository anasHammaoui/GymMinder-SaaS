<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'is_present',
        'attendance_date',
    ];
    protected $casts = [
        'attendance_date' => 'datetime',
    ];
    public function member(){
        return $this -> belongsTo(Member::class);
    }
}
