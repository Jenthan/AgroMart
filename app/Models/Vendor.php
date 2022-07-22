<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table="vendors";
    protected $fillable = [
        'user_id',
        'prophoto',
        'firstName',
        'lastName',
        'addressNo',
        'addressStreet',
        'addressCity',
        //'vehicle_id',
        'lisencePhoto',
    ];
    /*
    public function vehicle(){
        return $this->hasMany('App\Models\Vehicle','vehicle_id','id');
    }
    */
    public function vehicle(){
        return $this->hasMany('App\Models\Vehicle');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
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
