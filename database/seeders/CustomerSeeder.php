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
    }
}