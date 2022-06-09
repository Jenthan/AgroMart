<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverDetail extends Model
{
    use HasFactory;
    protected $fillable = [
		'deliver_id',
        'orderAddressNo',
        'orderAddressStreet',
		'orderAddressCity',
		
    ];
}
