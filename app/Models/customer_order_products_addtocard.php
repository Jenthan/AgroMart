<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_order_products_addtocard extends Model
{
    use HasFactory;
    protected $table = "customer_order_products_addtocards";
    protected $fillable = [
        'product_id',
        'customer_id',
        'qty',
        'ordertime',
    ];
}
