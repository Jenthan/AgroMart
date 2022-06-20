<?php

namespace Database\Seeders;
use App\Models\DeliverDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeliverDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliver_details')->insert([   
            'deliver_id' => '1',
            'orderAddressNo'=>'12',
            'orderAddressStreet' => 'Main Street',
            'orderAddressCity' => 'Galle'
        ]);
    }
}
