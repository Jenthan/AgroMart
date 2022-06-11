<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerRequestVendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'farmer_id',
        'vendor_id',
    ];
}