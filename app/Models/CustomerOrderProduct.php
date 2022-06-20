<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderProduct extends Model
{
    use HasFactory;
    protected $table = "customer_order_products";
    protected $fillable = [
        'product_id',
        'customer_id',
        'qty',
        'ordertime',
    ];
    
}
