<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FarmerDashController;
use App\Http\Controllers\FarmerMakeProductController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/f', function () {
    return view('index');
});


/*----  Home page Route  starts ---*/
Route::get('/',[MainController::class,'homeDisplay']);
Route::get('farmer',[MainController::class,'farmerDisplay']);
Route::get('card',[MainController::class,'addtocardDisplay']);
Route::get('product',[MainController::class,'productDisplay']);
Route::get('profile',[MainController::class,'profileDisplay']);
Route::get('vender',[MainController::class,'venderDisplay']);
Route::get('homelogin',[MainController::class,'homeloginDisplay'])->name('homelogin');
Route::get('adminprofile',[MainController::class,'adminprofileDisplay']);



/*------ check login --- */
Route::get('/checklogin',[UserController::class,'checklogin']);


//Route::get('/vendorlogin',[UserController::class,'checklogin']);
Route::get('/userprofile/{id}',[UserController::class,'userprofilelogin'])->name('/userprofile/{id}');




/* --- Add to card  Route ---*/
Route::get('checkout',[MainController::class,'checkoutDisplay']);


/* ---- farmer Page Route ---- */
Route::get('farmerdisplay',[MainController::class,'farmerprofiledisplay'])->name('farmerdisplay');

/*----vender Page route ---*/
Route::get('venderdisplay',[MainController::class,'venderprofiledisplay'])->name('venderdisplay');

/*-----profile Page Route ---*/
Route::get('farmerloginProfile',[MainController::class,'farmerloginProfileDisplay']);
Route::get('farmerprofileproduct',[MainController::class,'farmerproductdisplay']);
Route::get('farmerprofileedit',[MainController::class,'farmeredit']);
Route::get('farmeraddproduct',[MainController::class,'addproduct']);


/*------User Register form select -admincustomer----*/
Route::get('user_select',[UserController::class,'index']);
Route::get('register-customer',[UserController::class,'register_customer']);



Route::get('/customeradd',[UserController::class,'insertrecord']);


/* ---Admindashboard ----*/

Route::get('/adminorders',[AdminController::class,'admindashorders']);
Route::resource('admin',AdminController::class);
Route::get('/admindash',[AdminController::class,'index']);
Route::get('/admincustomerdisplay',[AdminController::class,'customerdisplay']);
Route::get('/adminproduct',[AdminController::class,'productdisplay']);
Route::get('/adminvender',[AdminController::class,'venderdisplay']);
Route::get('/adminfarmer',[AdminController::class,'farmerdisplay']);


// vendor routes starts
Route::get('/vendorLogout',[VendorController::class,'logout']);
Route::get('/vendorDashboard',[VendorController::class,'vendorDashboard']);
Route::get('/vendorOrders',[VendorController::class,'orderDetails']);
Route::get('/venderDeliveryDetails',[VendorController::class,'venderDeliveryDetails']);
Route::get('/cancelledOrders',[VendorController::class,'cancelledOrders']);
Route::get('/cancelledDeliverStatus/{id}',[VendorController::class,'cancelledDeliverStatus']);
Route::get('/acceptDeliverStatus/{id}',[VendorController::class,'acceptDeliverStatus']);
Route::get('/doneDeliverStatus/{id}',[VendorController::class,'doneDeliverStatus']);
Route::get('/venderreg',[VendorController::class,'vendorregistrationview']);
Route::post('/vendorregistration',[VendorController::class,'vendorregistration']);


// Farmer
Route::get('/farmer-base',[FarmerController::class,'index']);
Route::get('/farmerreg',[FarmerController::class,'farmerregistrationview']);
Route::post('/farmerregistration',[FarmerController::class,'farmerregistration']);
Route::get('/logout',[FarmerController::class,'logout']);


// Farmer  add product 
Route::get('/add-product',[FarmerMakeProductController::class,'index']);
Route::get('/create-product',[FarmerMakeProductController::class,'create']);
Route::post('/store-product',[FarmerMakeProductController::class,'store']);
Route::get('/edit-product/{product}',[FarmerMakeProductController::class,'edit']);
Route::post('/update-product/{product}',[FarmerMakeProductController::class,'update']);
Route::get('/delete-product/{product}',[FarmerMakeProductController::class,'destroy']);

// Farmer Password Change
Route::get('/farmer-password',[FarmerDashController::class,'password']);
Route::post('/farmer-changepassword/{user}',[FarmerDashController::class,'change_password']);

Route::get('/customerreg',[CustomerController::class,'customerregistrationview']);
Route::post('/customerregistration',[CustomerController::class,'customerregistration']);