<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $table = "farmers";
    protected $fillable = [
        'user_id',
        'prophoto',
        'firstName',
        'lastName',
        'gsCertificate',
        'farmName',
        'farmAddressNo',
        'farmAddressStreet',
        'farmAddressCity',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function vendor(){
        return $this->belongsToMany(Vender::class,'farmer_request_vendors');
    }

}
