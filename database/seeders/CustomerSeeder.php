<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       
   DB::table('customers')->insert([ 
        'user_id'=> 2,
        'prophoto' => '-----',  
        'customerName' => 'Jenthan',
        'customerAddressNo' => '12/B',
        'customerAddressStreet' => '3rd cross road',
        'customerAddressCity'=>'batticaloa',
    ]);  
       
    }
}
