<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FarmerRequestVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('farmer_request_vendors')->insert([ 
            'farmer_id'=> 1,
            'vendor_id' => 1,  
            'customer_order_id' => 2,
            'requeststatus' => 'cancelled',
        ]); 
       
    }
}
