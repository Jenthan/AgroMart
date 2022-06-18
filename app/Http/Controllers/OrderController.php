<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\CustomerOrderProduct;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use validator;


class OrderController extends Controller
{
    public function customerOrderindex($id)
    {
        $id = Auth::user()->id;
        $vendor = Vendor::all();
        $customer = Customer::all();
         $user = User::all()->where('role','customer');
         $order = CustomerOrderProduct::all();

         return view('customerdashboard.orders',compact('vendor','customer',
        'user','order'));
    }
}
