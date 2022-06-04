<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
