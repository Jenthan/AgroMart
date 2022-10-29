@extends('customerdashboard.base')

@section('main')	
    <main>
    <div class="head-title">
				<div class="left">
					<h1>Order</h1>
					<ul class="breadcrumb">
						<li>
							<a href="">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{url('/customerDashboardIndex')}}">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
					</ul>
				</div>
			
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3> Orders</h3>
					</div>
					<table>
						@php
						$i=1;
						@endphp
						<thead>
							<tr>
								<th>No</th>
								<th>ProductName</th>
                                <th>VenderName</th>
                                <th>quantity</th>
                                <th>Total price</th>
								<th>OrderDate</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orderte as $order)
							
							<tr>
								
								<td>{{$i++}}</td>
								<td>{{$order->productName}}</td>
						        <td>{{$order->firstName}} {{$order->lastName}}</td>
								<td>{{$order->qty}}</td>
								<td>
									@php
									$a=$order->qty;
									$b=$order->unitPrice;
									$c=$a*$b;
									@endphp
									
								{{$c}}</td>
								<td>
									@php
										$da = $order->oupdated_at;
										$date_arr= explode(" ", $da);
										$ndate= $date_arr[0];
										$ntime= $date_arr[1];
									@endphp

									{{$ndate}}
									</td>
								<td>{{$order->requeststatus}}</td>
								
							</tr>
							
						@endforeach	
						</tbody>
					</table>

				</div>
				
			</div>    

		</main>
@endsection