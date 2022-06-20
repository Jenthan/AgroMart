<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Customer;
use App\Models\DeliverDetail;
use App\Models\DeliverProduct;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function vendorDashboard(){
        $orders = DB::table('deliver_products')
        ->join('customers','deliver_products.customer_id','=','customers.id')
        ->join('vendors','vendors.id','=','deliver_products.vendor_id')
        ->select('customers.customerName','deliver_products.deliverstatus','vendors.user_id')
        ->get();

        return view('vendorDashboard.index',compact('orders'));
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
}
