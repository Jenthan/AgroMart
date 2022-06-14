<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table="vendors";

    public function vehicle(){
        return $this->hasMany(vehicle::class);
    }

    public function farmer(){
        return $this->belongsToMany(Farmer::class,'farmer_request_vendors');
    }
    public function product(){
        return $this->belongsToMany(Product::class,'deliver_products');
    }
    public function customer(){
        return $this->belongsToMany(Customer::class,'deliver_products');
    } 

}
