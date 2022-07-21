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
                'fname'=> 'required',
                'lname'=> 'required',
                'street'=> 'required',
                'village'=> 'required',
                'city'=> 'required',
                'phoneno' => 'required',
                'prophoto' => 'required',
                'lisence' => 'required',
                'vtype' => 'required',
                'vphoto' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'vnumber' => 'required',
            ]);

            $vendor = new Vendor([
                'firstName' => $request->get('fname'),
                'lastName' => $request->get('lname'),
                'addressNo' => $request->get('street'),
                'addressStreet' => $request->get('village'),
                'addressCity' => $request->get('city'),
            ]);
    
    
            $image = $request->file('prophoto');
            $imageName =date('YmdHi').'.' . $image->getClientOriginalExtension();
            $image->move(public_path('VendorImage'),$imageName);
            $vendor->prophoto =$imageName ;
    
    
            $limage = $request->file('lisence');
            $limageName =date('YmdHi').'.' . $limage->getClientOriginalExtension();
            $limage->move(public_path('LisenceImage'),$limageName);
            $vendor->lisencePhoto =$limageName ;
    
            $userphone = new UserPhone([
                'phone' => $request->get('phoneno'),
            ]);
    
            if (!$request->has('prophoto')) {
                return response()->json(['message' => 'Missing file'], 422);
            }
    
            $vehicle = new Vehicle([
                'vehicleType' => $request->get('vtype'),
                'vehicleNo' => $request->get('vnumber'),
            ]);
    
            $veimage = $request->file('vphoto');
            $veimageName =date('YmdHi').'.' . $veimage->getClientOriginalExtension();
            $veimage->move(public_path('VehicleImage'),$veimageName);
            $vehicle->vehiclePhoto =$veimageName ;
    
        
            $user = new User([
                'email' => $request->get('email'),
                'password' =>Hash::make( $request->get('password')),
            ]);
                $user->role ="vender";
    
            $user->save();
            $user->vendor()->save($vendor);
            $user->vehicle()->save($vehicle);
            $user->userphone()->save($userphone);
            return redirect('homelogin')->with('success','Your Vender Profile added successfully.!'); 
                
        }
    
}
