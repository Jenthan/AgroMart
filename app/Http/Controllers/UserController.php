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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.userselect');
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
        Auth::logout();
        return redirect('/');
    }

    
        public function insertrecord(){
            $customer = new Customer();
            $customer->customerName = "jenthan";
            $customer->customerAddressNo = "20";
            $customer->customerAddressStreet = "ganthi road";
            $customer ->customerAddressCity = "batticaloa";
    
            $user = new User();
            $user->role ="customer";
            $user->email = "jen@gmail.com";
            $user->password = encrypt('secret');
            $user->save();
            $user->customer()->save($customer);
    
            
    
            return "customer record success!!!";
        }
        
        public function checklogin(Request $request){
           $product = Product::all();
           $order = CustomerOrderProduct::all();
            $farmer = User::all()->where('role','farmer');
            $vendor = User::all()->where('role','vender');
            $customer = User::all()->where('role','customer');
			// Validation
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
    

        //Authentication

            $user_data = array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            );
            if(Auth::attempt($user_data))
                {
                    if(Auth::user()->role =='admin'){
                        return view('admindashboard.index',compact('customer','farmer',
                    'vendor','product'));
                    }elseif(Auth::user()->role =='customer'){
                        return view('customerindex',compact('order','customer'));
                    }elseif(Auth::user()->role =='farmer'){
                        return view('farmer-dash.index',compact('farmer'));
                    }elseif(Auth::user()->role =='vender'){
                        return view('vendorindex',compact('vendor'));
                    }
                }else{
                    return back()->with('error','Wrong Login Details');
                }
                
        }
    
}
