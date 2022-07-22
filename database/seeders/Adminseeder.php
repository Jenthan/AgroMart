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
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([   
            'email' => 'customer@gmail.com',
            'role'=>'customer',
            'password' => Hash::make('cus123'),
            'remember_token' => Str::random(10),
        ]);
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
