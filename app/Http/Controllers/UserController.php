<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\CustomerOrderProduct;
use App\Models\UserPhone;
use App\Models\Vehicle;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $products=Product::all();
        return view('register.user-select',compact('products'));
    }
    public function register_customer()
    {
        return view('register.CustomerRegistration');
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
           $products = Product::all();
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
          //  $id = Auth::User()->id;
          // $ncustomer = Customer::all()->where('user_id',$id);

            if(Auth::attempt($user_data))
                {
                    if(Auth::user()->role =='admin'){
                        return view('admindashboard.index',compact('customer','farmer',
                    'vendor','product'));
                    }elseif(Auth::user()->role =='customer'){
                        return view('cusindex2',compact('order','customer','products'));
                    }elseif(Auth::user()->role =='farmer'){
                        return view('farmer-dash.index',compact('farmer'));
                    }elseif(Auth::user()->role =='vender'){
                        return redirect('/vendorDashboard');
                    }
                }else{
                    return back()->with('error','Wrong Login Details');
                }
                
        }

        public function usertableupdate(){
            $id = 1;
            $user = User::find($id);
            $user->role = "farmer";

            $user->update();
        }

        public function vendorregistrationview(){
            return view('register.regivendor');
        }

        public function vendorregistration(Request $request){
        

            $this->validate($request, [
                'firstName'=> 'required',
                'lastName'=> 'required',
                'addressNo'=> 'required',
                'addressStreet'=> 'required',
                'addressCity'=> 'required',
                'phone' => 'required',
                'prophoto' => 'required',
                'lisencePhoto' => 'required',
                'vehicleType' => 'required',
                'vehiclePhoto' => 'required',
                'email'=> 'required|email',
                'password' => 'required',
                'vehicleNo' => 'required',
                'password' => 'min:6|required_with:confirmpassword|same:confirmpassword',
                'confirmpassword' => 'min:6'
            ]);
            $user = new User([
                'email' => $request->get('email'),
                'role' => ('vender'),
                'password' => Hash::make($request->get('password'))
            ]);
            $user->save();

            $vendor = new Vendor([
                'user_id' => DB::table('users')->where('email', $request->get('email'))->value('id'),
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
                'addressNo' => $request->get('addressNo'),
                'addressStreet' => $request->get('addressStreet'),
                'addressCity' => $request->get('addressCity'),
            ]);
            
    
            $image = $request->file('prophoto');
            $imageName =date('YmdHi').'.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/vendorImages'),$imageName);
            $vendor->prophoto =$imageName ;

            $image2 = $request->file('lisencePhoto');
            $imageName2 =date('YmdHi').'.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('public/vendorImages'),$imageName2);
            $vendor->lisencePhoto =$imageName2 ;
    
            $vendor->save(); 
    
            $userphone = new UserPhone([
                'user_id' => DB::table('users')->where('email', $request->get('email'))->value('id'),
                'phone' => $request->get('phone'),
            ]);

            $userphone->save(); 
    
            // if (!$request->has('prophoto')) {
            //     return response()->json(['message' => 'Missing file'], 422);
            // }
    
            $vehicle = new Vehicle([
                'user_id' => DB::table('users')->where('email', $request->get('email'))->value('id'),
                'vehicleType' => $request->get('vehicleType'),
                'vehicleNo' => $request->get('vehicleNo')
            ]);
    
            $veimage = $request->file('vehiclePhoto');
            $veimageName =date('YmdHi').'.' . $veimage->getClientOriginalExtension();
            $veimage->move(public_path('public/vehicleImages'),$veimageName);
            $vehicle->vehiclePhoto =$veimageName ;
            
            $vehicle->save();
            return redirect('homelogin')->with('success','Your Vender Profile added successfully.!'); 
                
        }
    
}
