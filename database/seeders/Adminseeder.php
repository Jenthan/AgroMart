<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       /* DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
        ]); */
        DB::table('farmer_request_vendors')->insert([ 
            'farmer_id'=> 1,
            'vendor_id' => 1,
            'product_id'=>1,  
            'customer_order_id' => 2,
            'requeststatus' => 'cancelled',
            
        ]);  
        DB::table('farmer_request_vendors')->insert([ 
            'farmer_id'=> 1,
            'vendor_id' => 2,
            'product_id'=>2,  
            'customer_order_id' => 4,
            'requeststatus' => 'accepted',

        ]);  
        
    }
}
