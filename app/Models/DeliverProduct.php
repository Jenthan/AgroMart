<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverProduct extends Model
{
    use HasFactory;
    protected $table = "deliver_products";
    protected $fillable =[
        'customer_id',
        'product_id',
        'vendor_id',
        'deliverstatus',
    ];

    public function deleverdetail(){
        return $this->belongsTo('App\Models\DeliverDetails');
    }
}
