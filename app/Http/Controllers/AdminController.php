<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Farmer;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $product = Product::all();
        return view('admindashboard.index',compact('user','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admindashorders(){
        return view('admindashboard.orders');
    }

    public function customerdisplay(){
        $customer = Customer::all();
        return view('admindashboard.customer',compact('customer'));
    }

    public function productdisplay(){
        $product = Product::all();
        return view('admindashboard.product',compact('product'));
    }

    public function venderdisplay(){
        $vendor = Vendor::all();
        return view('admindashboard.vender',compact('vendor'));
    }

    public function farmerdisplay(){
        $farmers = Farmer::all();
        return view('admindashboard.farmer',compact('farmers'));
    }
}
