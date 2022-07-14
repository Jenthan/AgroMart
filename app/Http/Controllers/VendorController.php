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
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $totalOrders = DB::table('deliver_products')->where('deliverstatus', 'pending')->count();

        $orders = DB::table('deliver_products')
        ->join('customers','deliver_products.customer_id','=','customers.id')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->select('customers.customerName','deliver_products.deliverstatus','vendors.user_id')
        ->get();

        return view('vendorDashboard.index',compact('orders','totalOrders'));
    }
    public function orderDetails(){
        $orders = DB::table('deliver_products')
        ->join('customers','deliver_products.customer_id','=','customers.id')
        ->join('products','products.id','=','deliver_products.product_id')
        ->join('deliver_details','deliver_details.deliver_id','=','deliver_products.id')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->select('customers.customerName','products.productName','vendors.user_id','products.farmer_id','deliver_products.id','deliver_products.vendor_id','deliver_products.orderQuantity','deliver_products.deliverstatus','deliver_details.orderAddressNo','deliver_details.orderAddressStreet','deliver_details.orderAddressCity')
        ->get();

        $farmers = Farmer::All();

        return view('vendorDashboard.orderDetails',compact('farmers','orders'));
    }
    public function venderDeliveryDetails(){
        $orders = DB::table('deliver_products')
        ->join('customers','deliver_products.customer_id','=','customers.id')
        ->join('products','products.id','=','deliver_products.product_id')
        ->join('deliver_details','deliver_details.deliver_id','=','deliver_products.id')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->select('customers.customerName','products.productName','vendors.user_id','products.farmer_id','deliver_products.id','deliver_products.vendor_id','deliver_products.orderQuantity','deliver_products.deliverstatus','deliver_details.orderAddressNo','deliver_details.orderAddressStreet','deliver_details.orderAddressCity')
        ->get();

        $farmers = Farmer::All();

        return view('vendorDashboard.deliverDetails',compact('farmers','orders'));
    }
    public function cancelledOrders(){
        $orders = DB::table('deliver_products')
        ->join('customers','deliver_products.customer_id','=','customers.id')
        ->join('products','products.id','=','deliver_products.product_id')
        ->join('deliver_details','deliver_details.deliver_id','=','deliver_products.id')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->select('customers.customerName','products.productName','vendors.user_id','products.farmer_id','deliver_products.id','deliver_products.vendor_id','deliver_products.orderQuantity','deliver_products.deliverstatus','deliver_details.orderAddressNo','deliver_details.orderAddressStreet','deliver_details.orderAddressCity')
        ->get();

        $farmers = Farmer::All();

        return view('vendorDashboard.cancelOrders',compact('farmers','orders'));
    }

    public function cancelledDeliverStatus(Request $request, $id)
    {
        $order = DeliverProduct::find($id);
        $order->deliverstatus = ('cancelled');
        $order->save();
        return back();
    }
    public function acceptDeliverStatus(Request $request, $id)
    {
        $order = DeliverProduct::find($id);
        $order->deliverstatus = ('processing');
        $order->save();
        return back();
    }
    public function doneDeliverStatus(Request $request, $id)
    {
        $order = DeliverProduct::find($id);
        $order->deliverstatus = ('delivered');
        $order->save();
        return back();
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

        $vehicles = DB::table('vehicles')->where('user_id', Auth::user()->id)->get();
        return view('vendorDashboard.vehicleIndex',compact( 'vehicles'));
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

}
