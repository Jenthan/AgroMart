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
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
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
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>    

		</main>

@endsection