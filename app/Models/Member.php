<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ["user_id","name","profile_picture","mobile_number","email","plan"];
    public function owner(){
        return $this -> belongsTo(User::class);
    }
    public function payment(){
        return $this -> hasMany(MemberPayment::class);
    }
    public function attendances(){
        return $this -> hasMany(Attendance::class);
    }
}
