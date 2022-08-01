@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Orders from Customers Details </h3>
            </div>
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
					</tr>
				</thead>
                @php
                    $i=1;
                @endphp
				<tbody>

                    @foreach($orders as $order)
                    @if($order->orderstatus == "confirmed")
                    <tr>
                        <th>{{$i++}}</th>
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
                        <td>
                            <form method="post" action="{{url('farmer-req-vendor')}}">
                                @csrf
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
                                    <button type="submit" class="status completed">REQ</button>
                                </div>
                            </form>
                        </td>
                    </tr>
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
                        <td>Wait for Order</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection