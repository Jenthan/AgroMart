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
       
        DB::table('users')->insert([   
        'email' => 'customer@gmail.com',
        'role'=>'customer',
        'password' => Hash::make('cus123'),
        'remember_token' => Str::random(10),
    ]);
  /*  DB::table('customers')->insert([ 
        'user_id'=> 3,  
        'customerName' => 'jenthan',
        'customerAddressNo' => '12/B',
        'customerAddressStreet' => '3rd cross road',
        'customerAddressCity'=>'batticaloa',
    ]);  */
        DB::table('users')->insert([   
            'email' => 'janith@gmail.com',
            'role'=>'vender',
            'password' => Hash::make('janith123'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([   
            'email' => 'ajanthan@gmail.com',
            'role'=>'farmer',
            'password' => Hash::make('aji123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
