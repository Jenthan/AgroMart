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

    
        DB::table('vendors')->insert([
            'user_id'=>"3",
            'prophoto'=>"****",
            'firstName'=>"Janith",
            'lastName'=>"Gihan",
            'addressNo'=>"32 A",
            'addressStreet'=>"First Cross Street",
            'addressCity'=>"Kegalle",
            'lisencePhoto'=>"------"
           // 'email' => Str::random(10).'@gmail.com',
           // 'password' => Hash::make('password'),
        ]);
        
    }
        
}
