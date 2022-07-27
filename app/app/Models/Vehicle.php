<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = "vehicles";
    protected $fillable = [

        'user_id',
        'vehicleNo',
        'vehiclePhoto',
        'vehicleType',
    ];

    public function vendor(){
        return $this->belongsTO('App\Models\Vendor'); 
    }
}
