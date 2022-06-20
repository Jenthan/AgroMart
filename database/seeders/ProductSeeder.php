<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'farmer_id'=>"1",
            'productName'=>"Tomato",
            'qty'=>"21",
            'productType'=>"vegetable",
            'unitPrice'=>"100"
        ]);
    }
}
