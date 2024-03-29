@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Orders from Customers Details </h3>
            </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            <table>
				<thead>
					<tr>
                        <th>No</th>
						<th>Customer Name</th>
                        <th>Address</th>
						<th>Product</th>
						<th>Qty</th>
						<th>Total Amount</th>
						<th>Select Vendor</th>
                        <th>Action</th>
					</tr>
				</thead>
                @php
                    $i=1;
                @endphp
			    <tbody>
                    @foreach($orders as $order)
                        @if($order->orderstatus == "confirmed")
                        <tr>
                            <td><span class="status completed">({{$i++}})</span></td>
                            <td>{{$order->customerName}}</td>
                            <td>{{$order->customerAddressNo}}, {{$order->customerAddressStreet}}, {{$order->customerAddressCity}}</td>
                            <td>{{$order->productName}}</td>
                            <td>{{$order->qty}}</td>
                            <td>
                                @php
                                    $up = $order->unitPrice;
                                    $t = $order->qty;
                                    $am = $up * $t;
                                @endphp 
                                Rs. {{$am}}.00/=
                            </td>
                            <form method="post" action="{{url('farmer-req-vendor')}}">
                                @csrf
                            <td>
                                <div class="col-sm-10">
                                    <select name="vendor_id" class="form-control">
                                        <option value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->firstName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="order_id" value="{{$order->orderid}}">
                                <input type="hidden" name="farmer_id" value="{{$order->farmid}}">
                                <input type="hidden" name="product_id" value="{{$order->proid}}">                                                      
                            </td>
                            <td>
                                <button type="submit" class="status completed">Req</button>
                                <a href="{{url('farmer-req-close',$order->orderid)}}" onclick="return confirm('Are you close the requests?')" class="status completed">Close</a>
                            </td>
                            </form>
                        </tr>
                            @php $j=1; @endphp
                            @foreach($requests as $req)
                                @if($order->orderid == $req->customer_order_id)
                                    <tr class="order_tr_req">
                                        <td></td>
                                        <td><span class="status process">{{$j++}}</span> Vendor : </td>
                                        <td>{{$req->firstName}} {{$req->lastName}}</td>
                                        <td>Expect Charge :</td>
                                        <td></td>
                                        <td>
                                            @if($req->vendorcharge == null)
                                                <span class="status pending">Pending</span> 
                                            @elseif($req->vendorcharge > 0)
                                                <label>Rs. {{$req->vendorcharge}}.00/=</label>                             
                                            @endif
                                        </td>
                                        <td>
                                            @if($req->vendorcharge == null)
                                                <label>Action :-  </label><span class="status pending">Pending</span> 
                                            @elseif($req->vendorcharge > 0 && $req->requeststatus == null)
                                            <form method="post" action="{{url('farmer-con-vendor',$req->reqid)}}">
                                                @csrf
                                                <input type="hidden" name="status" value="pending">
                                                <!--<label>Action :- <a href="{{url('farmer-con-vendor',$req->reqid)}}" class="status process">Accept</a></label> -->
                                                <label>Action :- <button type="submit" class="status process">Accept</button></label>
                                            </form>
                                            @elseif($req->requeststatus == 'requested')           
                                                <label>Status :-</label><span class="status completed">Requested</span> 
                                            @elseif($req->requeststatus == 'delivered')           
                                                <label>Status :-</label><span class="status completed">Delivered</span> 
                                            @endif
                                        </td>
                                    </tr>
                                
                                @endif
                            @endforeach
                        
                        @elseif($order->orderstatus == "notconfirmed")
                        <tr>
                            <td><span class="status pending">({{$i++}})</span></td>
                            <td>{{$order->customerName}}</td>
                            <td>{{$order->customerAddressNo}}, {{$order->customerAddressStreet}}, {{$order->customerAddressCity}}</td>
                            <td>{{$order->productName}}</td>
                            <td>{{$order->qty}}</td>
                            <td>
                                @php
                                    $up = $order->unitPrice;
                                    $t = $order->qty;
                                    $am = $up * $t;
                                @endphp 
                                Rs. {{$am}}.00/=
                            </td>
                            <td>Wait for Confirmation</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection