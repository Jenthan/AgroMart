<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FarmerMakeProductController;


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
Route::get('homelogin',[MainController::class,'homeloginDisplay']);
Route::get('adminprofile',[MainController::class,'adminprofileDisplay']);

/*------ check login --- */
Route::get('/checklogin',[UserController::class,'checklogin']);





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

/* Farmer Dashboard */
Route::get('/farmer-base',[FarmerController::class,'index']);

/* Farmer add product */
Route::get('/add-product',[FarmerMakeProductController::class,'index']);
Route::get('/create-product',[FarmerMakeProductController::class,'create']);
Route::post('/store-product',[FarmerMakeProductController::class,'store']);
