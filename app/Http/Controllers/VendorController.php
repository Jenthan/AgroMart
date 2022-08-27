<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\DeliverDetail;
use App\Models\DeliverProduct;
use App\Models\UserPhone;
use App\Models\FarmerRequestVendor;
use App\Models\CustomerOrderProduct;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function vendorDashboard(){
       $vid;
       $totalOrders = 0;
       $id = Auth::User()->id;
       $nvendor = Vendor::all()->where('user_id',$id);
       foreach($nvendor as $ven){
       $vid = $ven->id;
           
       }
      
       
        $orders = DB::table('farmer_request_vendors')
        ->join('products','products.id','=','farmer_request_vendors.product_id')
        ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
        ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
        ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
        ->select('products.productName','products.*','customer_order_products.qty','customer_order_products.updated_at','farmer_request_vendors.requeststatus','customer_order_products.customer_id',
        'farmers.firstName','farmers.lastName','products.unitPrice','farmers.*','farmers.farmAddressCity','customer_order_products.orderstatus','farmer_request_vendors.id as frid')
        ->where('farmer_request_vendors.vendor_id','=', $vid)
        ->where('farmer_request_vendors.requeststatus','=',NULL)
        ->where('farmer_request_vendors.vendorcharge','=',NULL)
        ->get();
        foreach($orders as $or){
            $totalOrders++;

        }

        $customers = Customer::all();

        return view('vendorDashboard.index',compact('orders','totalOrders','customers'));
    }
    public function orderDetails(){
        $vid;
        $totalOrders = 0;
        $id = Auth::User()->id;
        $nvendor = Vendor::all()->where('user_id',$id);
        foreach($nvendor as $ven){
        $vid = $ven->id;     
        }
        
         $orders = DB::table('farmer_request_vendors')
         ->join('products','products.id','=','farmer_request_vendors.product_id')
         ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
         ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
         ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
         ->select('products.productName','customer_order_products.qty','customer_order_products.updated_at','farmer_request_vendors.requeststatus','customer_order_products.customer_id',
         'farmers.firstName as ffname','farmers.lastName as flname','products.unitPrice','farmers.*','farmers.farmAddressCity','customer_order_products.orderstatus','farmer_request_vendors.id as frid')
         ->where('farmer_request_vendors.vendor_id','=', $vid)
         ->where('farmer_request_vendors.requeststatus','=','accepted')
         ->get();

        $customers = Customer::all();
        $farmers = Farmer::all();

        return view('vendorDashboard.orderDetails',compact('farmers','orders','customers'));
    }
    public function venderDeliveryDetails(){
        $orders = DB::table('deliver_products')
        ->join('farmer_request_vendors','farmer_request_vendors.id','=','deliver_products.farmer_request_vendors_id')
        ->select('deliver_products.*','farmer_request_vendors.*','deliver_products.id as dpid',
        'deliver_products.farmer_request_vendors_id as farmervendorid','farmer_request_vendors.farmer_id as farmerid',
        'farmer_request_vendors.vendor_id as vendorid','farmer_request_vendors.product_id as productid',
        'farmer_request_vendors.customer_order_id as cusorderid','farmer_request_vendors.updated_at as frvupdated_at')
        ->get();

        $farmers = Farmer::All();
        $customers = Customer::all();
        $vendors = Vendor::all();
        $products = Product::all();
        $cusorderproduct = CustomerOrderProduct::all();

        return view('vendorDashboard.deliverDetails',compact('farmers','orders','vendors','customers','cusorderproduct','products'));
    }
    public function cancelledOrders(){
        $vid;
        $totalOrders = 0;
        $id = Auth::User()->id;
        $nvendor = Vendor::all()->where('user_id',$id);
        foreach($nvendor as $ven){
        $vid = $ven->id;     
        }
        
         $orders = DB::table('farmer_request_vendors')
         ->join('products','products.id','=','farmer_request_vendors.product_id')
         ->join('vendors','vendors.id','=','farmer_request_vendors.vendor_id')
         ->join('farmers','farmers.id','=','farmer_request_vendors.farmer_id')
         ->join('customer_order_products','customer_order_products.id','=','farmer_request_vendors.customer_order_id')
         ->select('products.productName','customer_order_products.qty','customer_order_products.updated_at','farmer_request_vendors.requeststatus','customer_order_products.customer_id',
         'farmers.firstName as ffname','farmers.lastName as flname','products.unitPrice','farmers.*','farmers.farmAddressCity','customer_order_products.orderstatus','farmer_request_vendors.id as frid')
         ->where('farmer_request_vendors.vendor_id','=', $vid)
         ->where('farmer_request_vendors.requeststatus','=','cancelled')
         ->get();

        $customers = Customer::all();
        $farmers = Farmer::all();

        return view('vendorDashboard.deliveredOrders',compact('farmers','orders','customers'));
    }

    

    public function editVendor()
    {
    
        $vendor = DB::table('vendors')->where('user_id', Auth::user()->id)->first();
        return view('vendorDashboard.editProfile',compact( 'vendor'));
    }
    public function showVendor()
    {
        $vendor = DB::table('vendors')->where('user_id', Auth::user()->id)->first();
        return view('vendorDashboard.show',compact( 'vendor'));
    }
    public function store(Request $request, $id){

        $vendor = Vendor::find($id);
        $vendor->firstName = $request->get('firstName');
        $vendor->lastName = $request->get('lastName');
        $vendor->addressNo = $request->get('addressNo');
        $vendor->addressStreet = $request->get('addressStreet');
        $vendor->addressCity = $request->get('addressCity');

        if($request->file('image')){
            $currentPhoto = Vendor::find($id)->prophoto;  //fecthing user current photo

            if($request->image != $currentPhoto){  //if not matched
    
                $userPhoto = public_path('public/vendorImages/').$currentPhoto;
    
                if(file_exists($userPhoto)){
    
                    @unlink($userPhoto); // then delete previous photo
                    
                }
            
                if($request->file('image')){
                    $file= $request->file('image');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('public/vendorImages'), $filename);
                    $vendor->prophoto= $filename;
                }
            }
        }
        if($request->file('lisencePhoto')){
            $currentLisencePhoto = Vendor::find($id)->lisencePhoto;  //fecthing user current photo

            if($request->lisencePhoto != $currentLisencePhoto){  //if not matched

                $userLisencePhoto = public_path('public/lisenceImages/').$currentLisencePhoto;

                if(file_exists($userLisencePhoto)){

                    @unlink($userLisencePhoto); // then delete previous photo
                    
                }
            
                if($request->file('lisencePhoto')){
                    $file2= $request->file('lisencePhoto');
                    $filename2= date('YmdHi').$file2->getClientOriginalName();
                    $file2-> move(public_path('public/lisenceImages'), $filename2);
                    $vendor->lisencePhoto= $filename2;
                }
            }
        }
        
        $vendor->save();
        return redirect('/showVendor');

    }
    public function createPhone(){
        
        return view('vendorDashboard.addPhone');
    } 
    public function vehicleIndex(){

        $vehicles = Vehicle::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('vendorDashboard.vehicleIndex',compact( 'vehicles'))->with('1',(request()->input('page',1)-1)*5);
    }
    public function createVehicle(){
        
        return view('vendorDashboard.createVehicle');
    }
    public function storeVehicle(Request $request){
        $request->validate([
            'vehicleNo'=>'required',
            'vehicleType' =>'required'

        ]);
        $vehicle = new Vehicle([
            'user_id' =>Auth::user()->id,
            'vehicleNo' => $request->get('vehicleNo'),
            'vehicleType' => $request->get('vehicleType'),
        ]);
        if($request->file('vehiclePhoto')){
            $file2= $request->file('vehiclePhoto');
            $filename2= date('YmdHi').$file2->getClientOriginalName();
            $file2-> move(public_path('public/vehicleImages'), $filename2);
            $vehicle['vehiclePhoto']= $filename2;
        }
        $vehicle->save();
        return redirect('/vehicleIndex')->with('alert', 'Vehicle is added!');
    }
    public function vehicleDelete($id){
        $vehicle = Vehicle::find($id);

        $photo =  DB::table('vehicles')->where('id',$id)->value('vehiclePhoto');

        $userPhoto = public_path('public/vehicleImages/').$photo;

        if(file_exists($userPhoto)){
    
            @unlink($userPhoto); // then delete previous photo
            
        }

        $vehicle->delete();
        return redirect('/vehicleIndex')->with('alert', 'Vehicle is Deleted!');
    }



    public function vendorregistrationview(){
        return view('register.regivendor');
    }

    public function reqpending($id){
       $deliverproducts = DeliverProduct::find($id);
        $deliverproducts->deliverstatus = "pending";
        $deliverproducts->update();
        return redirect()->route('venderDeliveryDetails');
    }

    public function reqdelivered($id){
        $deliverproducts = DeliverProduct::find($id);
         $deliverproducts->deliverstatus = "delivered";
         $deliverproducts->update();
         return redirect()->route('venderDeliveryDetails');
     }

     //delivered orders

     public function venderDeliveredOrderDetails(){
        $orders = DB::table('deliver_products')
        ->join('farmer_request_vendors','farmer_request_vendors.id','=','deliver_products.farmer_request_vendors_id')
        ->select('deliver_products.*','farmer_request_vendors.*','deliver_products.id as dpid',
        'deliver_products.farmer_request_vendors_id as farmervendorid','farmer_request_vendors.farmer_id as farmerid',
        'farmer_request_vendors.vendor_id as vendorid','farmer_request_vendors.product_id as productid',
        'farmer_request_vendors.customer_order_id as cusorderid','farmer_request_vendors.updated_at as frvupdated_at')
        ->get();

        $farmers = Farmer::All();
        $customers = Customer::all();
        $vendors = Vendor::all();
        $products = Product::all();
        $cusorderproduct = CustomerOrderProduct::all();

        return view('vendorDashboard.deliveredOrders',compact('farmers','orders','vendors','customers','cusorderproduct','products'));
    }
    
    public function vendordeliverycharge(Request $request ,$id){
        $request->validate([
            'delivercharge'=>'required'
        ]);
        $farmerreqvendor = FarmerRequestVendor::find($id);
        $farmerreqvendor->vendorcharge = $request->get('delivercharge');
        $farmerreqvendor->update();

        return redirect()->route('vendorDashboard')->with('success', 'cost send successfully');
    }

}
