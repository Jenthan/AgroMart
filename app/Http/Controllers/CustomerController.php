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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Validator;
use DB;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get current date
        $cdate = Carbon::now();       
        $date_arr= explode(" ", $cdate);
        $ndate= $date_arr[0];
        $ntime= $date_arr[1];
       
       
        $vendor = Vendor::all();
        $customer = Customer::all();
         $user = User::all()->where('role','customer');
         $order = CustomerOrderProduct::all();
         $cid;
         $c1 =0;$c2=0;
         $c3=0; $c4=0;
         $id = Auth::User()->id;
         $ncustomer = Customer::all()->where('user_id',$id)->first();
         $cid = $ncustomer->id;
     
              $orderte = DB::table('farmer_request_vendors')
              ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
              ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
              ->join('products','products.id','=','farmer_request_vendors.product_id')
              ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
              ->select('customer_order_products.qty','customer_order_products.updated_at','farmer_request_vendors.customer_order_id',
              'vendors.firstName','vendors.lastName','farmer_request_vendors.requeststatus','products.productName','products.unitPrice','products.*',
              'customer_order_products.orderstatus')
              ->where('customer_order_products.customer_id','=', $cid)
              ->where('customer_order_products.orderstatus','=', "confirmed")
              ->get();

              $order = DB::table('customer_order_products')
              ->join('products','products.id','=','customer_order_products.product_id')
              ->join('customers','customers.id','=','customer_order_products.customer_id')
              ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
              ->select('products.productName','customer_order_products.qty','customer_order_products.id',
              'farmers.firstName','farmers.lastName','products.unitPrice','farmers.farmAddressCity',
              'customer_order_products.orderstatus','customer_order_products.updated_at')
              ->where('customer_order_products.customer_id','=', $cid)
              ->where('customer_order_products.orderstatus','=', "confirmed")
              ->get();
              
              foreach($orderte as $ordert){
                if($ordert->requeststatus =="cancelled"){
                    $c1 =$c1+1;
                }else{
                    $c2 =$c2+1;
                }
            }
           // dd($order);
            foreach($order as $or){
                
                $c3 = $c3+1;
                $da = $or->updated_at;
                $date_arr= explode(" ", $da);
                $tdate= $date_arr[0];
                $ttime= $date_arr[1];

                if($tdate =$ndate){
                    $c4 =$c4+1;
                }
            }              

         return view('customerdashboard.index',compact('vendor','customer',
        'user','order','orderte','c1','c2','c3','c4' ,'ndate',));
    }

    public function customerprofileview($id)
    {
        $customers = Customer::all()->where('user_id',$id);
         $user = User::find($id);
         //dd($user);
         $userphone = UserPhone::all()->where('user_id',$id);

         return view('customerdashboard.profileview',compact('customers','user','userphone'));
    }

    public function customerprofileedit($id)
    {
        $customers = Customer::all()->where('user_id',$id);
        $user = User::find($id);
        $usersphone = UserPhone::all()->where('user_id',$id);

         return view('customerdashboard.profileedit',compact('customers','user','usersphone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerDashboardIndex(){
        $products = Product::paginate(4);;
        $order = CustomerOrderProduct::all();
        $farmer = User::all()->where('role','farmer');
        $vendor = User::all()->where('role','vender');
        $customer = User::all()->where('role','customer');

        return view('cusindex2',compact('order','customer','products'))->with('1',(request()->input('page',1)-1)*4);

    }
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
        
        // $this->validate($request, [
        //     'customerName'=>'required',
        //     'email' => 'required|email',
        //     'customerAddressNo' => 'required',
        //     'customerAddressStreet' => 'required',
        //     'customerAddressCity' => 'required',
        //     'phone' => 'required'
        // ]);   
        
        $customer = Customer::find($id);
        $customer->customerName = $request->get('customerName');
        $customer->customerAddressNo = $request->get('customerAddressNo');
        $customer->customerAddressStreet = $request->get('customerAddressStreet');
        $customer->customerAddressCity = $request->get('customerAddressCity');
        if($request->file('image')){
            $currentPhoto = Customer::find($id)->prophoto;  //fecthing user current photo

            if($request->image != $currentPhoto){  //if not matched
    
                $userPhoto = public_path('public/customerImage/').$currentPhoto;
    
                if(file_exists($userPhoto)){
    
                    @unlink($userPhoto); // then delete previous photo
                    
                }
            
                if($request->file('image')){
                    $file= $request->file('image');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('public/customerImage'), $filename);
                    $customer->prophoto= $filename;
                }
            }
        }
        $customer->save();
        
        $uid = Auth::user()->id;
        $user = User::find($uid);
        $user->email = $request->get('email');
        $user->save();

        $pno = UserPhone::all()->where('user_id','=',Auth::user()->id)->first();
        $pno->phone = $request->get('phone');
        $pno->save(); 

        $ids =   Auth::user()->id;
        return redirect()->route('customerprofile', [$ids]);
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
        $user = new User([
            'email' => $request->get('email'),
            'role' => ('customer'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();

        // $customer = new Customer([
        //     'customerName' => $request->get('name'),
        //     'customerAddressNo' => $request->get('no'),
        //     'customerAddressStreet' => $request->get('street'),
        //     'customerAddressCity' => $request->get('city'),
        //     //'productImg' => $request->file('proImg'),
        //     //'farmer_id' => $request->get('farmerId'),
        // ]);

        $customer =  new Customer([
            'user_id' => DB::table('users')->where('email', $request->get('email'))->value('id'),
            'customerName' => $request->get('name'),
            'customerAddressNo' => $request->get('no'),
            'customerAddressStreet' => $request->get('street'),
            'customerAddressCity' => $request->get('city')
        ]);
        
        if (!$request->has('prophoto')) {
            return response()->json(['message' => 'Missing file'], 422);
        }
        
        $image = $request->file('prophoto');
        $imageName =date('YmdHi').'.' . $image->getClientOriginalExtension();
        $image->move(public_path('public/customerImage'),$imageName);
        $customer->prophoto =$imageName ;

        $customer->save(); 

        $userphone = new UserPhone([
            'user_id' => DB::table('users')->where('email', $request->get('email'))->value('id'),
            'phone' => $request->get('phoneno'),
        ]);

        $userphone->save(); 

        return redirect('homelogin')->with('success','Customer added successfully.!');
        
            
    }

}
