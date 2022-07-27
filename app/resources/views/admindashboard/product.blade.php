@extends('admindashboard.base')

@section('main')

<main>
    <div class="head-title">
				<div class="left">
					<h1>Products</h1>
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
							<a class="active" href="{{url('/adminproduct')}}">Products</a>
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
			</ul>  
                        -->

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3> Products Details</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>No</th>
                                <th>ProductName</th>
                                <th>Manufactured FarmerName</th>
								
                                <th>ProductType</th>
                                <th>quantity</th>
								<th>UnitPrice</th>
								
							</tr>
						</thead>
						<tbody>
							@php
							$id=1;
							@endphp
							@foreach($products as $product)
							<tr>
								<td>{{$id++}}</td>
								<td>{{$product->productName}}</td>
								<td>{{$product->firstName}} {{$product->lastName}}</td>
								
								<td>{{$product->productType}}</td>
								<td>{{$product->qty}}</td>
								<td>{{$product->unitPrice}}</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>

@endsection