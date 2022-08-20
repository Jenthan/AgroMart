<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href="{{ asset('https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css')}}" rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="/admin/admincss.css">

	<!-- farmer profile design  -->
	<link rel="stylesheet" href="/farmer/profile.css">
    <!-- boortstrap --->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<link rel='stylesheet' href="{{ asset('/farmer/style.css')}}">

	<script src="farmer.profile.js"></script>
	
	<script>
        function showPreview(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-1-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
           }
		function change_gs(event){
			if(event.target.files.length > 0){
				var src = URL.createObjectURL(event.target.files[0]);
				var preview = document.getElementById("gs_picture_new");
                    preview.src = src;
                    preview.style.display = "block";
			}
		}
    </script>


	<title>FarmerHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Farmer_Hub</span>
		</a>
		<ul class="side-menu top">
			<!--<li class="active">-->
			<li class="{{ (request()->is('farmer-base')) ? 'active' : '' }}">  
				<a href="{{url('farmer-base')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('farmer-profile-display')) ? 'active' : '' }}">  
				<a href="{{url('farmer-profile-display')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
            <li class="{{ (request()->is('add-product')) ? 'active' : '' }}">  
				<a href="{{url('add-product')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Items</span>
				</a>
			</li>
            <li class="{{ (request()->is('farmer-order-display')) ? 'active' : '' }}">
				<a href="{{url('farmer-order-display')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order Details</span>
				</a>
			</li>
            <li class="{{ (request()->is('farmer-vendor-display')) ? 'active' : '' }}">
				<a href="{{url('farmer-vendor-display')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Vendors</span>
				</a>
			</li>
			<li class="{{ (request()->is('farmer-hist-display')) ? 'active' : '' }}">
				<a href="{{url('farmer-hist-display')}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">History</span>
				</a>
			</li>
			<li class="{{ (request()->is('farmer-password')) ? 'active' : '' }}">  
				<a href="{{url('farmer-password')}}">
					<i class='bx bxs-lock-alt'></i>
					<span class="text">Change Password</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="{{url('logout')}}" class="logout">
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
			<!--
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		-->
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