@extends('vendorDashboard.home')
@section('main')
<html>
	<head>
	<script>
		var msg = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if(exist){
		alert(msg);
    }
  </script>
	</head>
<main>

    <div class="head-title">
				<div class="left">
					<h1>Deliver Details</h1>
					<ul class="breadcrumb">
							<a class="active" href="{{url('/vendorDashboard')}}">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{url('/vehicleIndex')}}">Vehicles</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a  href="#">Telephones</a>
						</li>
						
					</ul>
				</div>
			<!--	<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>   -->
			</div>
            <a class="btn btn-primary" href="{{url('/showVendor')}}"><i class='bx bx-chevron-left' ></i>Back</a>
            <a class="btn btn-success" href="{{url('/createPhone')}}">Add Mobile</a>
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
						<h3> Phones</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Phone Number</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php
							$i=0;
							@endphp
							@foreach($phones as $phone)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$phone->phone}}</td>
                                <td>
                                  <form method="post" action="{{route('userPhones.destroy',$phone->id)}}" >
                                  @method('DELETE') 
                                  @csrf 
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>    
                            </tr>
							@endforeach	
						</tbody>
					</table>
				</div>
				
			</div>    

		</main>
</html>
@endsection