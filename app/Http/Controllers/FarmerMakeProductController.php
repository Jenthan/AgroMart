<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;

class FarmerMakeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all()->where('role','farmer');
        $farmer=Farmer::all();
        return view('farmer-add-product.index',compact('user','farmer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer-add-product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=> 'required',
            'unitp' => 'required',
            'qty' => 'required',
            'category' => 'required',
            'proImg' => 'required',
            'farmerId' => 'required',
        ]);
        if($validator->fails()){
            return back() -> with('error','Invalid Details...!');
        }
        else
        {
            $item = new Product([
                'productName' => $request->get('product_name'),
                'unitPrice' => $request->get('unitp'),
                'qty' => $request->get('qty'),
                'productType' => $request->get('category'),
                //'productImg' => $request->file('proImg'),
                'farmer_id' => $request->get('farmerId'),
            ]);
            if($request->file('proImg')){
                $file= $request->file('proImg');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/productImage'), $filename);
                $item['productImg']= $filename;
            }
            $item->save();
            return redirect('add-product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
