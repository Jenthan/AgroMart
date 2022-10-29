@extends('vendorDashboard.home')

@section('main')
<main>

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
    <div class="head-title">
				<div class="left">
					<h1>Vendor Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a  href="{{url('/vendorDashboard')}}">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$totalOrders}}</h3>
						<p>New Order</p>
					</span>
				</li>
				<!-- <li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li> -->
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>

					</div>
					<table>
						<thead>
							<tr>
								<th>Customer</th>
								<th>Delivery Address</th>
								<th>Date Order</th>
								<th>ProductName</th>
								<th>Quantity</th>
								<th>Unit price</th>
								<th>Farmer Name</th>
								<th>Farmer Address</th>
								<th>Enter Delivery Charge</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
						
							@if($order->requeststatus != 'null')
								
								<tr>
									@foreach($customers as $customer)
										@if($order->customer_id == $customer->id)
										<td>{{$customer->customerName}}</td>
										<td>{{$customer->customerAddressNo}},{{$customer->customerAddressStreet}},{{$customer->customerAddressCity}}</td>
										@endif
									@endforeach
									<td>{{$order->updated_at}}</td>
									<th>{{$order->productName}}</th>
									<td>{{$order->qty}}</td>
									<td>{{$order->unitPrice}}</td>
									<td>{{$order->firstName}}{{$order->lastName}}</td>
									<td>{{$order->farmAddressNo}},{{$order->farmAddressStreet}},{{$order->farmAddressCity}}</td>
									<td>
										<form action="{{url('/vendordeliverycharge',$order->frid)}}" method="post">
											@csrf
											<input type="number" name="delivercharge" id="delivercharge">
											<button type="submit" class="btn btn-primary">Done</button>
										</form>
	
									</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>

@endsection