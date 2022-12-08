<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Customer;
use App\Models\CustomerOrderProduct;
use App\Models\customer_order_products_addtocard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;
use DB;
use format;
use Carbon\Carbon;

class CustomerMakeOrderController extends Controller
{
    public function index()
    {
        $user=User::all()->where('role','farmer');
        $farmer=Farmer::all();
        $id = Auth::User()->id;
        $products = Product::all();
        $farmer = Farmer::all()->where('user_id',$id);
       // dd($fa_rmer);
       // $products = Product::all()->where('farmer_id',$fa_rmer->id);
       // dd($products);
        return view('farmer-add-product.index',compact('user','farmer','products'));
    }

    public function addtocardOrder(Request $request){
        /*
        $this->validate($request, [
            'quantity'=> 'required',
            
        ]);
        $cid;
        $fid;
        $id = Auth::User()->id;
        $ncustomer = Customer::all()->where('user_id',$id);
        foreach($ncustomer as $cus){
        $cid = $cus->id;    
        }

        $fid;
        $p = Product::all()->where('id',$request->get('pid'));
        foreach($p as $pr){
            $fid = $pr->farmer_id;
        }
       // dd($fid );
      //dd($request->pid);
      $torderstatus = "notconfirmed";
        $temporder = new CustomerOrderProduct([
            'product_id' => $request->get('pid'),
            'customer_id' => $cid,
            'farmer_id'=>$fid,
            'orderstatus'=>$torderstatus,
            'qty' => $request->get('quantity'),
            
        ]);

        $temporder->save();
        
       return redirect()->back();
       */
        $this->validate($request, [
            'quantity'=> 'required',
            'pid' => 'required',
        ]);
        $cus_id = Auth::User()->id;
        $ncustomer = Customer::where('user_id',$cus_id)->first();
        $cid = $ncustomer->id;

        $pid = $request->get('pid');
        $p = Product::where('id',$request->get('pid'))->first();
        $fid = $p->farmer_id;
        
        if($p->qty < $request->get('quantity') )
        {
            return redirect()->back()->with('message','Your ordered quantity is higher than the current Stock...');
        }
        // dd($fid );
        //dd($request->pid);
        else {
            $torderstatus = "notconfirmed";
            $temporder = new CustomerOrderProduct([
                'product_id' => $request->get('pid'),
                'customer_id' => $cid,
                'farmer_id'=>$fid,
                'orderstatus'=>$torderstatus,
                'qty' => $request->get('quantity'),    
            ]);

            $temporder->save();
            $p->qty = $p->qty - $request->get('quantity');
            $p->save();
            return redirect()->back()->with('success','Your order is successfully!');
        }
    }

    public function addtocarddisplay(){
        $cid;
        $id = Auth::User()->id;
        $ncustomer = Customer::all()->where('user_id',$id);
        foreach($ncustomer as $cus){
        $cid = $cus->id;
            
        }
     
        $ordertemp = DB::table('customer_order_products')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->select('products.productName','customer_order_products.qty','customer_order_products.id',
        'farmers.firstName','farmers.lastName','products.unitPrice','farmers.farmAddressCity','customer_order_products.orderstatus')
        ->where('customer_order_products.customer_id','=', $cid)
        ->get();
        //dd($ordertemp);
       
        return view('card.index',compact('ordertemp'));
    }

    public function doneorder($id){
        $cusorder = CustomerOrderProduct ::find($id);
        //dd($cusorder->orderstatus);
        $cusorder = CustomerOrderProduct::find($id)
        ->update(['orderstatus'=>'confirmed']);

        return redirect()->back();
    }
    public function cardcheckoutdisplay(){
        $cid;
        $id = Auth::User()->id;
        $ncustomer = Customer::all()->where('user_id',$id);
        foreach($ncustomer as $cus){
        $cid = $cus->id;
            
        }
     
        $ordert = DB::table('customer_order_products')
        ->join('products','products.id','=','customer_order_products.product_id')
        ->join('customers','customers.id','=','customer_order_products.customer_id')
        ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
        ->select('products.productName','customer_order_products.qty','customer_order_products.id',
        'farmers.firstName','farmers.lastName','products.unitPrice','farmers.farmAddressCity',
        'customer_order_products.orderstatus','customer_order_products.updated_at')
        ->where('customer_order_products.customer_id','=', $cid)
        ->where('customer_order_products.orderstatus','=', 'confirmed')
        ->get();
        foreach($ordert as $or){
            $date = $or->updated_at;
        }
       // $newdate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
       //dd($newdate);
       
        return view('card.checkout',compact('ordert'));
    }

   public function searchdatedisplay(Request $request){
    $cid;
    $id = Auth::User()->id;
    $ncustomer = Customer::all()->where('user_id',$id);
    foreach($ncustomer as $cus){
    $cid = $cus->id;
        
    }
 
    $ordert = DB::table('customer_order_products')
    ->join('products','products.id','=','customer_order_products.product_id')
    ->join('customers','customers.id','=','customer_order_products.customer_id')
    ->join('farmers','farmers.id','=','customer_order_products.farmer_id')
    ->select('products.productName','customer_order_products.qty','customer_order_products.id',
    'farmers.firstName','farmers.lastName','products.unitPrice','farmers.farmAddressCity',
    'customer_order_products.orderstatus','customer_order_products.updated_at')
    ->where('customer_order_products.customer_id','=', $cid)
    
    ->get();
    return redirect()->back();
   }

   public function searchproduct(Request $request){
    $data = $request->get('searchvalue');
    $products=Product::all()->where('productName','=',$data);
    return view('cusindex2',compact('products'));
   }

}
