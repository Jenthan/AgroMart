@extends('customerdashboard.base')

@section('main')
<main>
    <div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="{{route('customerlogin')}}">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{url('/customerDashboardIndex')}}">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$c3}}</h3>
						<p>Total Orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$c4}}</h3>
						<p>Today Orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>{{$c1}}</h3>
						<p>Total Rejected Orders</p>
					</span>
				</li>
                <li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>{{$c2}}</h3>
						<p>Total Accetped Orders</p>
					</span>
				</li>

				
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Today Rejected Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                                <th>No</th>
								<th>ProductName</th>
								<th>ProductType</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i=1;
							@endphp
							@foreach($orderte as $order)
							@if($order->requeststatus =="cancelled")
							         @php
										$da = $order->updated_at;
										$date_arr= explode(" ", $da);
										$ndate= $date_arr[0];
										$ntime= $date_arr[1];
									@endphp
							@if($ndate == "{{$tdate}}")
							<tr>
								<td>{{$i++}}</td>
								<td>{{$order->productName}}</td>
								<td>{{$order->productType}}</td>
								<td>{{$order->qty}}</td>
								<td>{{$ndate}}</td>
							</tr>
						@endif
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="order">
					<div class="head">
						<h3>Today Accetped Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                                <th>No</th>
								<th>ProductName</th>
								<th>ProductType</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							@php
							$it=1;
							@endphp
							@foreach($orderte as $order)
							@if($order->requeststatus =="accepted")
							<tr>
								<td>{{$it++}}</td>
								<td>{{$order->productName}}</td>
								<td>{{$order->productType}}</td>
								<td>{{$order->qty}}</td>
							</tr>
							@endif
							@endforeach
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>    

		</main>

@endsection