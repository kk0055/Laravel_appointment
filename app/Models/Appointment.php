<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

 

    public function doctor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
