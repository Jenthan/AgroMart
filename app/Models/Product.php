<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function farmer(){
        return $this->belongsTO(Farmer::class);
    }

    public function customer(){
        return $this->belongsToMany(Customer::class,'customer_order_products');
    }

    public function customers(){
        return $this->belongsToMany(Customer::class,'deliver_products');
    }

    public function vender(){
        return $this->belongsToMany(Vender::class,'deliver_products');
    }
}
