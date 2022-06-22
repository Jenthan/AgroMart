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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Validator;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $vendor = Vendor::all();
        $customer = Customer::all();
         $user = User::all()->where('role','customer');
         $order = CustomerOrderProduct::all();

         return view('customerdashboard.index',compact('vendor','customer',
        'user','order'));
    }

    public function customerprofileview($id)
    {
        $customers = Customer::find($id);
        $customer = "jenthan";
         $user = User::find($id);
         $usersphone = UserPhone::find($id);

         return view('customerdashboard.profileview',compact('customers','user','usersphone'));
    }

    public function customerprofileedit($id)
    {
        $customers = Customer::find($id);
        $customer = "jenthan";
         $user = User::find($id);
         $usersphone = UserPhone::find($id);

         return view('customerdashboard.profileedit',compact('customers','user','usersphone'));
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

    public function customereditupdate(Request $request, $id){
        
        $this->validate($request, [
            'customerName'=>'required',
            'email' => 'required|email',
            'customerAddressNo' => 'required',
            'customerAddressStreet' => 'required',
            'customerAddressCity' => 'required',
            'phone' => 'required'
        ]);   
        
        

      //  $users->update($request->all());
     //   $customer->update($request->all());
      //  $userphone->update($request->all());

      //  return redirect()->route('customerprofile',Auth::user()->id)->with('success','customer updated Successfully!');
      // return back()->with('error','Wrong Login Details');

       $customers = Customer::find($id);
        $customers->customerName = $request->input('customerName');;
        $customers->customerAddressNo = $request->input('customerAddressNo');;
        $customers->customerAddressStreet = $request->input('customerAddressStreet');;
        $customers->customerAddressCity = $request->input('customerAddressCity');
            $customers->update();

        $user = User::find($id);
        $user->email = $request->input('email');
        $user->update();

        
        $usersphone = UserPhone::find($id);
        $usersphone->phone = $request->input('phone');
        $usersphone->update();   

        return view('customerdashboard.profileview',compact('customers','user','usersphone'))->with('success','Product updated successfully');

    }


    public function customerregistrationview(){
        return view('register.regcustomer');
    }

    public function customerregistration(Request $request){
        

        $this->validate($request, [
            'name'=> 'required',
            'no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'phoneno' => 'required',
            'prophoto' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        $customer = new Customer([
            'customerName' => $request->get('name'),
            'customerAddressNo' => $request->get('no'),
            'customerAddressStreet' => $request->get('street'),
            'customerAddressCity' => $request->get('city'),
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
        $image->move(public_path('customerImage'),$imageName);
        $customer->image =$imageName ;


        $customer = new Customer([
            'customerName' => $request->get('name'),
            'customerAddressNo' => $request->get('no'),
            'customerAddressStreet' => $request->get('street'),
            'customerAddressCity' => $request->get('city'),
            //'farmer_id' => $request->get('farmerId'),
        ]);
       

        

        $user = new User([
            'email' => $request->get('email'),
            
            'password' =>Hash::make( $request->get('password')),
            
            //'productImg' => $request->file('proImg'),
            //'farmer_id' => $request->get('farmerId'),
        ]);
            $user->role ="customer";

        $user->save();
        $user->customer()->save($customer);
        $user->userphone()->save($userphone);
        return redirect('homelogin')->with('success','Customer added successfully.!');
        
            
    }
}