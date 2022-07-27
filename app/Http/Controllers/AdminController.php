<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\UserPhone;
use App\Models\CustomerOrderProduct;
use App\Models\FarmerRequestVendor;
use App\Models\Farmer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Validator;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c1=0;
        $c2=0;
        $user = User::all();
        $product = Product::all();

        $orders = DB::table('customer_order_products')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->select('products.*','customer_order_products.*','customers.*','farmers.*','customer_order_products.updated_at as update')
        ->where('customer_order_products.orderstatus','=', 'confirmed')
        ->get();
        $ors = DB::table('customer_order_products')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->select('products.*','customer_order_products.*','customers.*','farmers.*','customer_order_products.updated_at as update')
        ->where('customer_order_products.orderstatus','=', 'confirmed')
        ->orderBy('customer_order_products.id', 'desc')->take(10)
        ->get();

        $reorders = DB::table('deliver_products')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->join('customers','customers.id','=','deliver_products.customer_id')
        ->join('products','products.id','=','deliver_products.product_id')
        ->select('deliver_products.orderQuantity','deliver_products.created_at' ,'deliver_products.deliverstatus',
        'products.productName','customers.customerName','products.unitPrice','deliver_products.updated_at')
        ->where('deliver_products.deliverstatus','=', 'delivered')
        ->orderBy('deliver_products.updated_at', 'desc')->take(10)
        ->get();
      // $or = CustomerOrderProduct::orderBy('id', 'desc')->take(10)->get();
      // dd($or);
        foreach($orders as $order){
            $c1=$c1+1;
        }
        foreach($user as $us){
            $c2 = $c2+1;
        }

        $c2= $c2-1;
        return view('admindashboard.index',compact('user','orders','product','c1','c2','ors','reorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admindashorders(){
        $orders = DB::table('deliver_products')
         ->join('vendors','vendors.id','=','deliver_products.vendor_id')
         ->join('customers','customers.id','=','deliver_products.customer_id')
         ->join('products','products.id','=','deliver_products.product_id')
         ->select('deliver_products.orderQuantity','deliver_products.created_at' ,'deliver_products.deliverstatus',
         'products.productName','customers.customerName','products.unitPrice')
         ->get();
        return view('admindashboard.orders',compact('orders'));
    }

    public function customerdisplay(){
        $customers = Customer::all();
        return view('admindashboard.customer',compact('customers'));
    }

    public function productdisplay(){
        $products = DB::table('products')
         ->join('farmers','farmers.id','=','products.farmer_id')
         ->select('products.*','farmers.*')
         ->get();
        return view('admindashboard.product',compact('products'));
    }

    public function venderdisplay(){
        $vendor = Vendor::all();
        return view('admindashboard.vender',compact('vendor'));
    }

    public function farmerdisplay(){
        $farmers = Farmer::all();
        return view('admindashboard.farmer',compact('farmers'));
    }

    public function farmerProfiledisplay($id){
        $farmer = Farmer::find($id);
        $uid = $farmer->user_id;
        $user = User::find($uid);
       // $userphone = UserPhone::where('user_id','=',$user->id);
        $userphone = DB::table('user_phones')
        ->join('users','users.id','=','user_phones.user_id')
        ->select('user_phones.*','users.*')
        ->where('users.id','=',$uid)
        ->get();
        return view('admindashboard.farmerprodisplay',compact('farmer','user','userphone'));
    }

    public function back(){
        return redirect()->route('adminfarmer');
    }

    public function deletefarmer($id){
        $farmer = Farmer::find($id);
        $uid = $farmer->user_id;
        $user = User::find($uid)->delete();
        return redirect()->route('adminfarmer')->with('success','farmer delete successfully');
    }
    public function customerProfiledisplay($id){
        $customer = Customer::find($id);
        $uid = $customer->user_id;
        $user = User::find($uid);
       // $userphone = UserPhone::where('user_id','=',$user->id);
        $userphone = DB::table('user_phones')
        ->join('users','users.id','=','user_phones.user_id')
        ->select('user_phones.*','users.*')
        ->where('users.id','=',$uid)
        ->get();
        return view('admindashboard.customerprodisplay',compact('customer','user','userphone'));
    }

    public function backcus(){
        return redirect()->route('admincustomer');
    }

    public function deletecustomer($id){
        $customer = Customer::find($id);
        $uid = $customer->user_id;
        $user = User::find($uid)->delete();
        return redirect()->route('admincustomer')->with('success','customer delete successfully');
    }

    public function vendorProfiledisplay($id){
        $vendor = Vendor::find($id);
        $uid = $vendor->user_id;
        $user = User::find($uid);
       // dd($user);
       // $userphone = UserPhone::where('user_id','=',$user->id);
        $userphone = DB::table('user_phones')
        ->join('users','users.id','=','user_phones.user_id')
        ->select('user_phones.*','users.*')
        ->where('users.id','=',$uid)
        ->get();
        $vehicles = Vehicle::all()->where('user_id','=',$uid);
        return view('admindashboard.vendorprodisplay',compact('vendor','user','userphone','vehicles'));
    }

    public function backven(){
        return redirect()->route('adminvendor');
    }

    public function deletevendor($id){
        $vendor = Vendor::find($id);
        $uid = $vendor->user_id;
        $user = User::find($uid)->delete();
        return redirect()->route('adminvendor')->with('success','vendor deleted successfully');
    }

    public function adminprofile(){
        
        return view('admindashboard.passwordresert');
    }

    public function passwordresert(Request $request,$id)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required',
            'con_password' => 'required|same:password',
        ]);
        $user = User::all()->where('id','=',$id)->first();
        $data = $request->all();
        if(Hash::check($data['current_password'],$user->password))
        {
            $user->password=Hash::make($data['password']);
            $user->update();
            return back()->with('success','Your password changed successfully!');
        }
        else
        {
            return back()->with('error','Your Current password is not matched!');
        }
    }
}
