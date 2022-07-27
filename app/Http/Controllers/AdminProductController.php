<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;

class AdminProductController extends Controller
{
    public function check(){
        return view('admindashboard.check');
    }
    public function customerdisplay(){
        $customer = Customer::all();
        return view('admindashboard.customer',compact('customer'));
    }
}
