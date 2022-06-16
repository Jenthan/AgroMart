<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    use HasFactory;
    protected $table = "user_phones";

    public function user(){
        return $this->belongsTO(User::class); 
    }
}
