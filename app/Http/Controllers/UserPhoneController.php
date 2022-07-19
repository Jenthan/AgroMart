<?php

namespace App\Http\Controllers;

use App\Models\UserPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserPhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = DB::table('user_phones')->where('user_id', Auth::user()->id)->get();
        return view('vendorDashboard.phoneIndex',compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobile'=>'required',

        ]);
        $mobile = new UserPhone([
            'user_id' =>Auth::user()->id,
            'phone' => $request->get('mobile'),
        ]);
        $mobile->save();
        return redirect()->route('userPhones.index')->with('alert', 'Telephone is added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function show(UserPhone $userPhone)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPhone $userPhone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPhone $userPhone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPhone $userPhone)
    {
        $userPhone->delete();
        return back()->with('alert', 'Telephone is deleted!');
    }
}
