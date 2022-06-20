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
        DB::table('farmers')->insert([
            'user_id'=>"4",
            'firstName'=>"Ajanthan",
            'lastName'=>"Rethnakumar",
            'gsCertificate'=>"------",
            'farmName'=>"Matale",
            'farmAddressNo'=>"50",
            'farmAddressStreet'=>"New Town",
            'farmAddressCity'=>"MainStreet"
        ]);
    }
}
