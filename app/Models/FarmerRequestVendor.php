<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerRequestVendor extends Model
{
    use HasFactory;
    protected $table = "farmer_request_vendors";
    protected $fillable =[
        'farmer_id',
        'vendor_id',
        'order_id',
        'requeststatus',
    ];

    
}
