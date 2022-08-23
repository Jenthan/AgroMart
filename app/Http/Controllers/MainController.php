<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use validator;

class MainController extends Controller
{
    public function homeDisplay(){
        $products = Product::all();
        return view('home.index',compact('products'));
    }

    public function addtocardDisplay(){
        return view('card.index');
    }

    
    public function farmerDisplay(){
        return view('farmer.index');
    }

     
    public function productDisplay(){
        $products=Product::all();
       // $data = Auth::user()->all();
       // dd($data);
        return view('product.index',compact('products'));
    }

    public function venderDisplay(){
        return view('vender.index');
    }

    public function profileDisplay(){
        return view('profile.index');
    }

    public function checkoutDisplay(){
        return view('card.checkout');
    }

    public function homeloginDisplay(){
        $products = Product::all();
        return view('home.login',compact('products'));
    }

    public function farmerprofiledisplay(){
        return view('farmer.display');
    }

    public function venderprofiledisplay(){
        return view('vender.display');
    }

    public function adminprofileDisplay(){
        return view('profile/admin.index');
    }

    public function farmerloginProfileDisplay(){
        return view('profile/farmer.display');
    }

    public function farmerproductdisplay(){
        return view('profile/farmer.productdetails');
    }

    public function farmeredit(){
        return view('profile/farmer.edit');
    }

    public function addproduct(){
        return view('profile/farmer.addproduct');
    }

    public function checkhomesearchDisplay(Request $request){
       /* $request->validate([
            'searchvalue'=>'required',

        ]);*/
        $data = $request->get('searchvalue');
        
        $products=Product::all()->where('productName','=',$data);
       //dd($products);
        return view('product.index',compact('products'));
    }

    public function vegDisplay(){
        $products=Product::all()->where('productType','=','vegetable');
      
        return view('product.index',compact('products'));
    }

    public function fruitDisplay(){
        $products=Product::all()->where('productType','=','fruit');
       //dd($products);
        return view('product.index',compact('products'));
    }

    public function milkDisplay(){
        $products=Product::all()->where('productType','=','milk');
       //dd($products);
        return view('product.index',compact('products'));
    }

    public function leastvegDisplay(){
        
        return view('product.index',compact('products'));
    }
    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }

}
