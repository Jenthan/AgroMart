<?php

namespace Database\Seeders;
use App\Models\Customer;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('customers')->insert([
            'user_id'=>"2",
            'customerName'=>"customer",
            'customerAddressNo'=>"21",
            'customerAddressStreet'=>"brownsroad",
            'customerAddressCity'=>"batticaloa"
           // 'email' => Str::random(10).'@gmail.com',
           // 'password' => Hash::make('password'),
        ]);
        DB::table('vendors')->insert([
            'user_id'=>"3",
            'vehicle_id'=>"1",
            'vendorName'=>"Janith",
            'lisencePhoto'=>"------"
           // 'email' => Str::random(10).'@gmail.com',
           // 'password' => Hash::make('password'),
        ]);
        
    }
}
