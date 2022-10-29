@extends('vendorDashboard.home')

@section('main')
<main>
    <div class="head-title">
				<div class="left">
					<h1>Orders</h1>
					<ul class="breadcrumb">
							<a class="active" href="{{url('/vendorDashboard')}}">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a  href="#">Orders</a>
						</li>
					</ul>
				</div>
			<!--	<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>   -->
			</div>

			<ul class="box-info">
				<!--<li>
                    <form class="form-inline">
                        <div class="form-group mb-1">
                            <label for="startdate" class="sr-only">startdate</label>
                            <input type="text" readonly class="form-control-plaintext" id="startdate" value="StartDate">
                        </div>
                        <div class="form-group mx-sm-5 mb-1">
                            <label for="startdate" class="sr-only">startdate</label>
                            <input type="date" class="form-control" id="startdate" name="startdate" placeholder="Startdate">
                        </div>
                        <div class="form-group mb-1">
                            <label for="enddate" class="sr-only">enddate</label>
                            <input type="text" readonly class="form-control-plaintext" id="enddate" name="enddate" value="EndDate">
                        </div>
                        <div class="form-group mx-sm-4 mb-1">
                            <label for="enddate" class="sr-only">enddate</label>
                            <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Enddate">
                        </div>
                        <button type="submit" class="btn btn-primary mx-sm-5 mb-2">Search</button>
                    </form>
				</li> -->
                <!--
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
				</li>  -->
			</ul>  


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3> Accepted Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Customer Name</th>
                                <th>Product Name</th>
								<th>Farmer Name</th>
                                <th>Quantity</th>
								<th>Order Date</th>
								<th>Farmer Address</th>
								<th>Order Address</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i=0;
							@endphp
							@foreach($orders as $order)
								
									<tr>
										<td>{{++$i}}</td>
										@foreach($customers as $customer)
											@if($order->customer_id == $customer->id)
											<td>{{$customer->customerName}}</td>
											@endif
									    @endforeach
										<td>{{$order->productName}}</td>
										<td>{{$order->ffname}} {{$order->flname}}</td>
										<td>{{$order->qty}}</td>
										<td>{{$order->updated_at}}</td>
										<td>{{$order->farmAddressNo}}, {{$order->farmAddressStreet}}, {{$order->farmAddressCity}}</td>
										@foreach($customers as $customer)
											@if($order->customer_id == $customer->id)
											<td>{{$customer->customerAddressNo}},{{$customer->customerAddressStreet}},{{$customer->customerAddressCity}}</td>
											@endif
									    @endforeach
										<td>
											
										</td>
									</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>
@endsection