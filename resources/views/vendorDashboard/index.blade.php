@extends('vendorDashboard.home')

@section('main')
<main>
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
								<th>Date Order</th>
								<th>ProductName</th>
								<th>Quantity</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
						
							@if($order->requeststatus != 'null')
								
								<tr>
									@foreach($customers as $customer)
										@if($order->customer_id == $customer->id)
										<td>{{$customer->customerName}}</td>
										@endif
									@endforeach
									<td>{{$order->updated_at}}</td>
									<th>{{$order->productName}}</th>
									<td>{{$order->qty}}</td>
									<td>
									
										<a href="{{url('/reqaccepted',$order->frid)}}"><button class="btn btn-primary">Accept</button></a>
										<a href="{{url('/reqrejected',$order->frid)}}"><button class="btn btn-success">Rejected</button></a>
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