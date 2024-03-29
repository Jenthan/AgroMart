@extends('admindashboard.base')

@section('main')

<main>
    <div class="head-title">
				<div class="left">
					<h1>Order</h1>
					<ul class="breadcrumb">
						<li>
							<a href="{{url('/admindash')}}">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{url('/admindash')}}">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Orders</a>
						</li>
					</ul>
				</div>
			<!--	<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>   -->
			</div>
<!--
			<ul class="box-info">
				<li>
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
			</ul>   -->


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3> Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Vendor Name</th>
                                <th>Product Name</th>
                                <th>quantity</th>
								<th>OrderDate</th>
								<th>Order status</th>
								
							</tr>
						</thead>
						<tbody>
							@php
							$i=1;
							@endphp
							@foreach($frvorders as $order)
							<tr>
								
								<td>{{$i++}}</td>
								<td>{{$order->firstName}} {{$order->lastName}}</td> 
								<td>{{$order->productName}}</td>
								<td> {{$order->qty}}</td>
								<td> {{$order->created_at}}</td>
								@if($order->requeststatus == "requested")
								<td>Pending</td>
							    @elseif($order->requeststatus == "delivered")
								<td>Delivered</td>
								@endif
							
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>

@endsection