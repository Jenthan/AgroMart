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

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farmer-dash.index');
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
