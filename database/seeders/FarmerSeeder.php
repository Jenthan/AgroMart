<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Farmer;
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
      /*  User::Create([
            'email' => 'ajan@gmail.com',
            'role' => 'farmer',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);   */
        Farmer::Create([
            'user_id' => 3,
            'firstName' => 'Ajan',
            'lastName' => 'than',
            'farmName' => 'Jame Farm',
            'farmAddressNo' => '22/8',
            'farmAddressStreet' => 'Steal Road',
            'farmAddressCity' => 'Jaffna',
        ]);
    }
}
