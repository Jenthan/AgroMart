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
    $ncustomer = Customer::all()->where('user_id',$id)->first();
    $cid = $ncustomer->id;
        //dd($cid);
         //$user = User::all()->where('role','customer');
         //$order = CustomerOrderProduct::all();
         $temorder = FarmerRequestVendor::all();

         $orderte = DB::table('farmer_request_vendors')
         ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
         ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
         ->join('products','products.id','=','farmer_request_vendors.product_id')
         ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
         ->select('customer_order_products.qty','customer_order_products.updated_at','farmer_request_vendors.customer_order_id',
         'vendors.firstName','vendors.lastName','farmer_request_vendors.requeststatus','products.productName','products.unitPrice',
         'customer_order_products.orderstatus')
         ->where('customer_order_products.customer_id','=', $cid)
         ->where('customer_order_products.orderstatus','=', "confirmed")
         ->orderBy('customer_order_products.updated_at', 'desc')
         ->get();
         return view('customerdashboard.orders',compact('orderte'));
    }
}
