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

