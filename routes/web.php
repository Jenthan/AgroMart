<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FarmerController;

use App\Http\Controllers\UserPhoneController;

use App\Http\Controllers\FarmerDashController;

use App\Http\Controllers\FarmerMakeProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMakeOrderController;


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
Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::get('/f', function () {
        return view('index');
    });

   



/*----  Home page Route  starts ---*/
Route::get('/',[MainController::class,'homeDisplay'])->name('home');
Route::get('farmer',[MainController::class,'farmerDisplay']);
Route::get('product',[MainController::class,'productDisplay']);
Route::get('profile',[MainController::class,'profileDisplay']);
Route::get('vender',[MainController::class,'venderDisplay']);
Route::post('checkhomesearch',[MainController::class,'checkhomesearchDisplay']);
Route::get('/searchVeg',[MainController::class,'vegDisplay']);
Route::get('/searchfruit',[MainController::class,'fruitDisplay']);
Route::get('/searchmilk',[MainController::class,'milkDisplay']);
Route::get('/cuslogout',[MainController::class,'logout']);
Route::post('/cusprosearch',[MainController::class,'cusproductsearch']);


    Route::get('homelogin',[MainController::class,'homeloginDisplay'])->name('logHome');
    Route::get('adminprofile',[MainController::class,'adminprofileDisplay']);


    Route::resource('userPhones',UserPhoneController::class);
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
    Route::get('/admindash',[AdminController::class,'index'])->name('admindash');
    Route::get('/admincustomerdisplay',[AdminController::class,'customerdisplay'])->name('admincustomer');
    Route::get('/adminproduct',[AdminController::class,'productdisplay']);
    Route::get('/adminvender',[AdminController::class,'venderdisplay'])->name('adminvendor');
    Route::get('/adminfarmer',[AdminController::class,'farmerdisplay'])->name('adminfarmer');
    Route::get('/adminfarmerprofile/{id}',[AdminController::class,'farmerProfiledisplay'])->name('farprofile');
    Route::get('/back',[AdminController::class,'back'])->name('back_farmer');
    Route::get('/deletefarmer/{id}',[AdminController::class,'deletefarmer'])->name('deletefarmer');
    Route::get('/admincustomerprofile/{id}',[AdminController::class,'customerProfiledisplay'])->name('cusprofile');
    Route::get('/backcus',[AdminController::class,'backcus'])->name('back_customer');
    Route::get('/deletecustomer/{id}',[AdminController::class,'deletecustomer'])->name('deletecustomer');
    Route::get('/adminvendorprofile/{id}',[AdminController::class,'vendorProfiledisplay'])->name('venprofile');
    Route::get('/backven',[AdminController::class,'backven'])->name('back_vendor');
    Route::get('/deletevendor/{id}',[AdminController::class,'deletevendor'])->name('deletevendor');
    Route::get('/adprofile',[AdminController::class,'adminprofile'])->name('adprofile');
    Route::post('/adprofile/{id}',[AdminController::class,'passwordresert'])->name('passwordset');


    // vendor routes starts
    Route::get('/vendorLogout',[VendorController::class,'logout']);
    Route::get('/vendorDashboard',[VendorController::class,'vendorDashboard']);
    Route::get('/vendorOrders',[VendorController::class,'orderDetails']);
    Route::get('/venderDeliveryDetails',[VendorController::class,'venderDeliveryDetails']);
    Route::get('/cancelledOrders',[VendorController::class,'cancelledOrders']);
    Route::get('/cancelledDeliverStatus/{id}',[VendorController::class,'cancelledDeliverStatus']);
    Route::get('/acceptDeliverStatus/{id}',[VendorController::class,'acceptDeliverStatus']);
    Route::get('/doneDeliverStatus/{id}',[VendorController::class,'doneDeliverStatus']);
    Route::get('/editVendor',[VendorController::class,'editVendor']);
    Route::get('/showVendor',[VendorController::class,'showVendor']);
    Route::put('/store/{id}',[VendorController::class,'store']);
    Route::get('/createPhone',[VendorController::class,'createPhone']);
    Route::get('/vehicleIndex',[VendorController::class,'vehicleIndex']);
    Route::get('/createVehicle',[VendorController::class,'createVehicle']);
    Route::post('/storeVehicle',[VendorController::class,'storeVehicle']);
    Route::delete('/vehicleDelete/{id}',[VendorController::class,'vehicleDelete']);



// vendor routes reg starts
Route::get('/venderreg',[UserController::class,'vendorregistrationview'])->name('vendorregview');
Route::post('/vendorregistration',[UserController::class,'vendorregistration']);


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
// Farmer Profile page 
Route::get('farmer-profile-display',[FarmerDashController::class,'profile']);
// Farmer Order Details view
Route::get('farmer-order-display',[FarmerDashController::class,'order_view']);

//Farmer view Vendor details
Route::get('farmer-vendor-display',[FarmerDashController::class,'vendor_view']);



//Customer
Route::get('/customerreg',[CustomerController::class,'customerregistrationview']);
Route::post('/customerregistration',[CustomerController::class,'customerregistration']);




//Customer
Route::get('/customerreg',[CustomerController::class,'customerregistrationview']);

Route::post('/customerregistration',[CustomerController::class,'customerregistration']);
Route::post('/searchdate',[OrderController::class,'searchdate']);




Route::get('/customerlogin',[CustomerController::class,'index'])->name('customerlogin');
Route::get('/customerorder/{id}',[OrderController::class,'customerOrderindex'])->name('customerorder');
Route::get('/customerprofile/{id}',[CustomerController::class,'customerprofileview'])->name('customerprofile');
Route::get('/customerprofileedit/{id}',[CustomerController::class,'customerprofileedit'])->name('customerprofileedit');
Route::put('/customeredit/{id}',[CustomerController::class,'customereditupdate'])->name('customeredit');

Route::post('card',[CustomerMakeOrderController::class,'addtocardOrder']);
Route::get('carddisplay',[CustomerMakeOrderController::class,'addtocarddisplay']);
Route::get('/done/{id}',[CustomerMakeOrderController::class,'doneorder'])->name('done');
Route::get('/cardcheckout',[CustomerMakeOrderController::class,'cardcheckoutdisplay']);
Route::get('/searchdate',[CustomerMakeOrderController::class,'searchdatedisplay']);
Route::get('/searchproduct',[CustomerMakeOrderController::class,'searchproduct']);
  });

