
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet"  href="{{ asset('/customer/customerdash.css')}}">

    <!-- boortstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
	<title>CustomerHub</title>

</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{route('customerlogin')}}" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">CustomerHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{route('customerlogin')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{route('customerorder',Auth::user()->id)}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
            
           
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="{{route('customerprofile',Auth::user()->id)}}">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{url('/cuslogout')}}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>   
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		
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
							<a class="active" href="#">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="#">Orders</a>
						</li>
					</ul>
				</div>
			
			</div>
<!--
			<ul class="box-info">
				<li>
                    <form class="form-inline" action="{{url('/searchdate')}}" method="post">
						@csrf
                        <div class="form-group mb-1">
                            <label for="startdate" class="sr-only">startdate</label>
                            <input type="text" readonly class="form-control-plaintext" id="startdate" value="StartDate">
                        </div>
                        <div class="form-group mx-sm-5 mb-1">
                            <label for="startdate" class="sr-only">startdate</label>
                            <input type="date" class="form-control" id="startdate" name="date" placeholder="date">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mx-sm-5 mb-2">Search</button>
                    </form>
				</li>
               
			</ul>   -->


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

		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="customerdash.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
