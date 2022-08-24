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
                            <td>{{$i++}}</td>
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
                                {{$am}}
                            </td>
                            <form method="post" action="{{url('farmer-req-vendor')}}">
                                @csrf
                            <td>
                                
                                <div class="form-group row">
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
                                </div>                            
                            </td>
                            <td>
                                <button type="submit" class="status completed">REQ</button>
                                <a href="{{url('farmer-req-close',$order->orderid)}}" onclick="return confirm('Are you close the requests?')" class="status completed">Close</a>
                            </td>
                            </form>
                        </tr>
                            @php $j=1; @endphp
                            @foreach($requests as $req)
                                @if($order->orderid == $req->customer_order_id)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$j++}}. {{$req->firstName}} {{$req->lastName}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        
                        @elseif($order->orderstatus == "notconfirmed")
                        <tr>
                            <td>{{$i++}}</td>
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
                                {{$am}}
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