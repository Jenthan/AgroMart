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
                        <td>
                            <a href="farmer-request-view/{{$order->id}}" class="">Select</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection