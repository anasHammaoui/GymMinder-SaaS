<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformPayment extends Model
{
    protected $fillable = [
        'user_id',
        'paymentDate',
        'paymentMethod',
    ];
    public function owner(){
        return $this -> belongsTo(User::class);
    }
}
