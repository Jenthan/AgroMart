<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\UserPhone;
use App\Models\CustomerOrderProduct;
use App\Models\Farmer;
use App\Models\FarmerRequestVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;

class FarmerDashController extends Controller
{
    public function password()
    {
        return view('farmer-password.password');
    }

    public function change_password(Request $request,User $user)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required',
            'con_password' => 'required|same:password',
        ]);
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
    public function profile()
    {
        $user = User::where('id',Auth::User()->id)->first();
        $farmer=Farmer::where('user_id',Auth::User()->id)->first();
        $userphone=UserPhone::where('user_id',Auth::User()->id)->first();
        return view('farmer-profile.profile',compact('user','farmer','userphone'));
    }
    public function profile_update(Request $request,User $user)
    {
        $validate = Validator::make($request->all(),[
            'fname'=> 'required',
            'lname' => 'required',
            'no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'farmname' => 'required',
            'phoneno' => 'required',
            'email' => 'required|email',
        ]);
        if($user->email != $request->get('email')){
            $validate_email = Validator::make($request->all(),[
                'email' => 'required|email|unique:users',
            ]);
            if($validate_email->fails()){
                return back()->with('error','Your Email account already used by Someone...');
            }
        }
        if($validate->fails()){
            return back()->with('error','Invalid Updated Details...');
        }
        else{
            $user->email = $request->get('email');
            $user->update();
            
            $farmer = Farmer::where('user_id','=',$user->id)->first();
            $farmer -> update([
                'firstName' => $request->get('fname'),
                'lastName' => $request->get('lname'),
                'farmName' => $request->get('farmname'),
                'farmAddressNo' => $request->get('no'),
                'farmAddressStreet' => $request->get('street'),
                'farmAddressCity' => $request->get('city'),
            ]);
            $mobile = UserPhone::where('user_id',$user->id)->first();
            $mobile->phone = $request->get('phoneno');
            $mobile->update();

            if($request->file('prophoto')){
                $file= $request->file('prophoto');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('FarmerImage'), $filename);
                $farmer->prophoto = $filename;
                $farmer->update();
            }
            if($request->file('gsphoto')){
                $file= $request->file('gsphoto');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('GsImage'), $filename);
                $farmer->gsCertificate = $filename;
                $farmer->update();
            }

            return redirect('farmer-profile-display')->with('success','Profile updated successfully.!');
        }
    }
    public function order_view()
    {
        $fid = Farmer::where('user_id',Auth::User()->id)->first();
        $orders = DB::table('customer_order_products')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->select('customers.customerName','customers.customerAddressNo','customers.customerAddressStreet',
        'products.productName','products.unitPrice','customerAddressCity','customer_order_products.id as orderid',
        'farmers.id as farmid','products.id as proid','customer_order_products.orderstatus',
        'customer_order_products.qty as qty')
        ->where('farmers.id',$fid->id)
        ->get();
        $vendors = Vendor::all();
        return view('farmer-order.order',compact('orders','vendors'));
    }

    public function vendor_req(Request $request)
    {
        $this->validate($request,[
            'vendor_id' => 'required',
            'order_id' => 'required',
            'product_id' => 'required',
            'farmer_id' => 'required',
        ]);
        $req = new FarmerRequestVendor([
            'farmer_id' => $request->get('farmer_id'), 
            'vendor_id' => $request->get('vendor_id'),
            'product_id' => $request->get('product_id'),
            'customer_order_id' => $request->get('order_id'),
        ]);
        $req->save();
        $id=$request->get('order_id');
        $cus_order = CustomerOrderProduct::find($id)->update(['orderstatus' => 'requested']);
        //$cus_order = CustomerOrderProduct::where('id','=',$request->get('order_id'))->update(['orderstatus' => 'req']);
        //$cus_order -> update(['orderstatus' => 'req']);
        return back()->with('success','Vendor request is successfully.!');
    }

    public function vendor_view()
    {
        $vendors = DB::table('users')
        ->join('vendors','vendors.user_id','=','users.id')
        ->join('vehicles','vehicles.user_id','=','users.id')
        ->join('user_phones','user_phones.user_id','=','users.id')
        ->get();
        return view('farmer-vendor.vendor',compact('vendors'));
    }

    public function histo()
    {
        return view('farmer-history.history');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
