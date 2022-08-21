@extends('farmer-dash.base')
  
@section('main')
<main>
    <div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$order_count}}</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$cus_count}}</h3>
						<p>Customers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$vendor_count}}</h3>
						<p>Vendors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>Rs. 0.00/=</h3>
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
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($recents as $recent)
								@if($recent->status == 'notconfirmed')
									<tr>
										<td>
											<img src="">
											<p>{{$recent->name}}</p>
										</td>
										<td>{{$recent->date}}</td>
										<td><span class="status pending">Pending</span></td>
									</tr>
								@elseif($recent->status == 'confirmed')
									<tr>
										<td>
											<img src="">
											<p>{{$recent->name}}</p>
										</td>
										<td>{{$recent->date}}</td>
										<td><span class="status completed">Confirmed</span></td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="order">
					<div class="head">
						<h3>New Vendors</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Profile</th>
								<th>Full Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach($vendors as $vendor)
							<tr>
								<td>
									<img src="{{url('public/vendorImages/'.$vendor->prophoto)}}">
									<p></p>
								</td>
								<td>
									<p>{{$vendor->firstName}} {{$vendor->lastName}}</p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>

@endsection