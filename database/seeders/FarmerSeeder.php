<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Farmer;
use App\Models\UserPhone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'email' => 'ajan@gmail.com',
            'role' => 'farmer',
            'password' => Hash::make('password'),
        ]);
        Farmer::Create([
            'user_id'=> 1,
            'firstname' => 'Ajan',
            'lastname' => 'Than',
            'farmName' => 'Fresh Fruits',
            'farmAddressNo' => '23/5',
            'farmAddressStreet' => 'Yarl road',
            'farmAddressCity' => 'Jaffna',
        ]);
        UserPhone::Create([
            'user_id' => 1,
            'phone' => '0777788888',
        ]);
        UserPhone::Create([
            'user_id' => 1,
            'phone' => '0717171718',
        ]);
    }
}
