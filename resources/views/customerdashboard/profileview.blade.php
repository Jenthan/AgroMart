
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="customerdash.css">
    <link rel="stylesheet" href="reg.css">
	<link rel="stylesheet"  href="{{ asset('/customer/customerdash.css')}}">

    <!-- boortstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    
	<title>CustomerHub</title>

    <style>



body form h2{
    text-align: center;
    font-family: Georgia, 'Times New Roman', Times, serif;
    color: rgb(7, 150, 95);
    font-style: oblique;
   
}

.btn{
    background-color: rgb(45, 182, 45);
    color: rgb(243, 234, 234);
    font-weight: bold;
    
}

form{
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    background-color:rgb(222, 246, 216);
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 60px;
    padding-right: 20px;
    
}

    </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
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
				<a href="#" class="logout">
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
					<h1>Profile</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a class="active" href="{{route('customerprofile',Auth::user()->id)}}">Settings</a>
						</li>
					</ul>
				</div>

            	<a href="{{route('customerprofileedit',Auth::user()->id)}}" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Edit Profile</span>
				</a>   
			
			</div>
			

			<ul class="box-info">
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
         @endif
		        
		         
				
               <form class="border border-success rounded-3">
			       @csrf
                   @method('PUT')
					
                    <h2>Customer Details</h2> <br>
					
				@foreach($customers as $customer)

                    <div class="row mb-2">
                        <label for="fname" class="col-sm-2 col-form-label-sm">Customer Name:</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="fname" disabled value="{{$customer->customerName}}">
                        </div>
                    </div>

                    

                    <div class="row mb-2">
                        <label for="address" class="col-sm-2 col-form-label-sm">Address:</label>
                        <div class="col-sm-9">
                        <div class="mb-2"><input type="text" disabled  class="form-control form-control-sm" placeholder="No/Apartment/Village" id="address" value="{{$customer->customerAddressNo}}"></div>
                        <div class="mb-2"><input type="text" disabled class="form-control form-control-sm" placeholder="Street(optional)" id="address" value="{{$customer->customerAddressStreet}}"></div>
                        <input type="text" disabled class="form-control form-control-sm" placeholder="City" id="address" value="{{$customer->customerAddressCity}}">
                        </div>
                    </div>
			
                    <div class="row mb-2">
                        <label for="phone" class="col-sm-2 col-form-label-sm">Phone:</label>
                        <div class="col-sm-9">
                        <div class="mb-2"><input type="tel" disabled class="form-control form-control-sm " patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" placeholder="mobile" value="{{$usersphone->phone}}"></div>
                        
                        </div>
                    </div>
				
                    <div class="row mb-2">
                        <label for="profilephoto"  class="col-sm-2 col-form-label-sm">Profile Photo:</label>
                        <div class="col-sm-9">
                        <input class="form-control form-control-sm" id="profilephoto" type="file" disabled value="{{$customer->prophoto}}">
                        </div>
                    </div>


                    <div class="row mb-2">
                        <label for="mail" class="col-sm-2 col-form-label-sm">Email:</label>
                        <div class="col-sm-9">
                        <input type="email" class="form-control form-control-sm" id="mail" value="{{$user->email}}" disabled>
                        </div>
                    </div>
                    
                    <br>
			@endforeach
                    </form>
			
               
			</ul>  


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
