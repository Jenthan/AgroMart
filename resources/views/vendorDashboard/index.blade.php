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
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
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
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
								@if($order->user_id == Auth::user()->id)
								<tr>
									<td>{{$order->customerName}}</td>
									<td>01-10-2021</td>
									<td>
									@if($order->deliverstatus == 'pending')
										<span class="status pending">Pending</span>
									@endif
									@if($order->deliverstatus == 'cancelled')
										<span class="status cancell">Cancelled</span>
									@endif
									@if($order->deliverstatus == 'processing')
										<span class="status process">Delivering</span>
									@endif
									@if($order->deliverstatus == 'delivered')
										<span class="status completed">Delivered</span>
									@endif
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