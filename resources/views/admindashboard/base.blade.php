<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin/admincss.css">
	<link rel="stylesheet"  href="{{ asset('/customer/customerdash.css')}}">

    <!-- boortstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		
		<ul class="side-menu top">
			<li class="{{ (request()->is('admindash')) ? 'active' : '' }}">
				<a href="{{url('/admindash')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('adminorders')) ? 'active' : '' }}">
				<a href="{{url('adminorders')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order</span>
				</a>
			</li>
            <li class="{{ (request()->is('admincustomerdisplay')) ? 'active' : '' }}">
				<a href="{{url('admincustomerdisplay')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Customer</span>
				</a>
			</li>
            <li class="{{ (request()->is('adminvender')) ? 'active' : '' }}">
				<a href="{{url('/adminvender')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Vendor</span>
				</a>
			</li>
            <li class="{{ (request()->is('adminfarmer')) ? 'active' : '' }}">
				<a href="{{url('/adminfarmer')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Farmer</span>
				</a>
			</li>
			<li class="{{ (request()->is('adminproduct')) ? 'active' : '' }}">
				<a href="{{url('adminproduct')}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Product</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="{{url('/adprofile')}}">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{url('/logout')}}" class="logout">
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
			
		<!--	<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
		<!--	<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>  -->
		<!--	<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a> 
			<a href="#" class="profile">
				<img src="admin/images/people.png">
			</a> -->
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