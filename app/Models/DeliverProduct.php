<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverProduct extends Model
{
    use HasFactory;
    protected $table = "deliver_products";

    public function deleverdetail(){
        return $this->belongsTo('App\Models\DeliverDetails');
    }
}
