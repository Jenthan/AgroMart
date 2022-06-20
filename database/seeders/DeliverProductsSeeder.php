<?php

namespace Database\Seeders;
use App\Models\DeliverProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DeliverProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliver_products')->insert([   
            'customer_id' => '1',
            'product_id'=>'1',
            'vendor_id' => '1',
            'orderQuantity' => '3',
            'deliverstatus' => 'pending'
        ]);
    }
}
