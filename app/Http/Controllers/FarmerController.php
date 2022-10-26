<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\UserPhone;
use App\Models\CustomerOrderProduct;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Validator;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fid = Farmer::where('user_id',Auth::User()->id)->first();

        $order_count=CustomerOrderProduct::where('orderstatus','=','confirmed')->where('farmer_id',$fid->id)->count();
        $cus_count=Customer::all()->count();
        $vendor_count=Vendor::all()->count();

        $sales = DB::table('farmer_request_vendors')
        ->join('deliver_products','deliver_products.farmer_request_vendors_id','=','farmer_request_vendors.id')
        ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
        ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->select('customer_order_products.qty','products.unitPrice as up','farmer_request_vendors.farmer_id')
        ->where('deliver_products.deliverstatus','delivered')
        ->where('farmer_request_vendors.farmer_id','=',$fid->id)
        ->get();
        $tsales=0;
        foreach($sales as $sale)
        {
            $tsales = $tsales + ($sale->qty * $sale->up);
        }

        $recents = DB::table('customer_order_products')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->select('customers.customerName as name',
            'customers.prophoto as img',
            'customer_order_products.updated_at as date',
            'customer_order_products.orderstatus as status')
        ->where('farmers.id',$fid->id)
        ->orderBy('customer_order_products.updated_at','desc')
        ->take(5)->get();

        $vendors = Vendor::take(5)->get();
        return view('farmer-dash.index',compact('order_count','cus_count','vendor_count','recents','vendors','tsales'));
    }

    public function farmerregistrationview(){
        return view('register.regfarmer');
        
    }

    public function farmerregistration(Request $request)
    {
        $this->validate($request, [
            'fname'=> 'required',
            'lname' => 'required',
            'no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'farmname' => 'required',
            'phoneno' => 'required',
            'email' => 'required|email',
            'gsphoto' => 'required',
            'password' => 'required',
        ]);

        $farmer = new Farmer([
            'firstName' => $request->get('fname'),
            'lastName' => $request->get('lname'),
            'farmName' => $request->get('farmname'),
            'farmAddressNo' => $request->get('no'),
            'farmAddressStreet' => $request->get('street'),
            'farmAddressCity' => $request->get('city'),
            //'productImg' => $request->file('proImg'),
            //'farmer_id' => $request->get('farmerId'),
        ]);

        $userphone = new UserPhone([
            'phone' => $request->get('phoneno'),
        ]);

        if (!$request->has('prophoto')) {
            return response()->json(['message' => 'Missing file'], 422);
        }

        $image = $request->file('prophoto');
        $imageName =date('YmdHi').'.' . $image->getClientOriginalExtension();
        $image->move(public_path('FarmerImage'),$imageName);
        $farmer->prophoto =$imageName ;

        if($request->file('gsphoto')){
            $file= $request->file('gsphoto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('GsImage'), $filename);
            $farmer['gsCertificate']= $filename;
        }
        
        $user = new User([
            'email' => $request->get('email'),
            
            'password' =>Hash::make( $request->get('password')),
            
            //'productImg' => $request->file('proImg'),
            //'farmer_id' => $request->get('farmerId'),
        ]);
            $user->role ="farmer";

        $user->save();
        $user->farmer()->save($farmer);
        $user->userphone()->save($userphone);
        return redirect('homelogin')->with('success','Farmer User added successfully.!');
        
            
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
