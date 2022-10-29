<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin/admincss.css">

    <!-- boortstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>VendorHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	
		<a href="#" class="brand">
			<img src="images/logo.png" alt="" width="230px">
		</a>
		<ul class="side-menu top">
		<li class="{{ (request()->is('vendorDashboard')) ? 'active' : '' }}">  
				<a href="{{url('/vendorDashboard')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Vendor Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('vendorOrders')) ? 'active' : '' }}">  
				<a href="{{url('/vendorOrders')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order Details</span>
				</a>
			</li>
            <li class="{{ (request()->is('venderDeliveryDetails')) ? 'active' : '' }}"> 
				<a href="{{url('/venderDeliveryDetails')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Delivery Details</span>
				</a>
			</li>
            <li class="{{ (request()->is('cancelledOrders')) ? 'active' : '' }}"> 
				<a href="{{url('/deliveredOrders')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Delivered Orders</span>
				</a>
			</li>
           
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<form action="#">
				<div class="form-input">
				</div>
			</form>
			<a href="{{url('/showVendor')}}">
			<i class="fa-solid fa-car-side"></i>
				</a>
			<a href="{{url('/showVendor')}}" class="profile">
				Profile
			</a>
            <a href="{{url('/vendorLogout')}}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		
             @yield('main')

		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="admin/adminjs.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>