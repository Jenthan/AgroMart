<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homeDisplay(){
        return view('home.index');
    }

    public function addtocardDisplay(){
        return view('card.index');
    }

    
    public function farmerDisplay(){
        return view('farmer.index');
    }

     
    public function productDisplay(){
        return view('product.index');
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
        return view('home.login');
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

}
