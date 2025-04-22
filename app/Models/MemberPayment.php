<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    protected $fillable = ["amount","payment_method","user_id","member_id"];
    public function member(){
        return $this -> belongsTo(Member::class);
    }
}
