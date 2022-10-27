<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\UserPhone;
use App\Models\CustomerOrderProduct;
use App\Models\Farmer;
use App\Models\FarmerRequestVendor;
use App\Models\DeliverProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;

class FarmerSearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request,[
            'item' => 'required',
        ]);
        $data = $request->get('item');
        $products = Product::where('productName','like',$data.'%')->get();
        
        $user=User::all()->where('role','farmer');
        //$farmer=Farmer::all();
        $id = Auth::User()->id;
        $farmer = Farmer::all()->where('user_id',$id);

        return view('farmer-add-product.index',compact('user','farmer','products'));
    }
    public function index(Request $request)
    {

    }
}
