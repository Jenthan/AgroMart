<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverDetail extends Model
{
    use HasFactory;
    protected $table = "deliver_details";

    public function deliverproduct(){
      return $this->hasOne('App\Models\DeliverProduct');
  }
}
