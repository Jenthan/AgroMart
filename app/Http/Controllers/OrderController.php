<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\CustomerOrderProduct;
use App\Models\Farmer;
use App\Models\FarmerRequestVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use validator;
use DB;


class OrderController extends Controller
{
    public function customerOrderindex($id){
    
        $cid;
    $id = Auth::User()->id;
    $ncustomer = Customer::all()->where('user_id',$id);
        foreach($ncustomer as $cus){
        $cid = $cus->id;    
        }
        
         //$user = User::all()->where('role','customer');
         //$order = CustomerOrderProduct::all();
         $temorder = FarmerRequestVendor::all();

         $orderte = DB::table('farmer_request_vendors')
         ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
         ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
         ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
         ->select('customer_order_products.qty','customer_order_products.updated_at',
         'vendors.firstName','vendors.lastName','farmer_request_vendors.requeststatus',
         'customer_order_products.orderstatus')
         ->where('customer_order_products.customer_id','=', $cid)
         ->get();

         $products = DB::table('customer_order_products')
    ->join('products','products.id','=','customer_order_products.product_id')
    ->join('customers','customers.id','=','customer_order_products.customer_id')
    ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
    ->select('products.productName','customer_order_products.id')
    ->where('customer_order_products.customer_id','=', $cid)
    ->get();

        dd($products);
         return view('customerdashboard.orders',compact('ncustomer','orderte','products'));
    }
}
