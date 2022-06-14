<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function product(){
        return $this->belongsToMany(Product::class,'customer_order_products');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'deliver_products');
    }

    public function vender(){
        return $this->belongsToMany(Vender::class,'deliver_products');
    }

}
