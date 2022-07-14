@extends('vendorDashboard.home')
@section('main')
<script>
		var msg = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if(exist){
		alert(msg);
    }
  </script>
<main>
    <div class="head-title">
				<div class="left">
					<h1>Deliver Details</h1>
					<ul class="breadcrumb">
							<a class="active" href="{{url('/vendorDashboard')}}">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                            <a class="active" href="{{route('userPhones.index')}}">Telephones</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a  href="#">Vehicles</a>
						</li>
                        <li>
                       
					</ul>
				</div>
			<!--	<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>   -->
			</div>
            <a class="btn btn-primary" href="{{url('/showVendor')}}"><i class='bx bx-chevron-left' ></i>Back</a>
            <a class="btn btn-success" href="{{url('/createVehicle')}}">Add Vehicle</a>
            <ul class="box-info">
				
			</ul>  


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3> Vehicles</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Vehicle Number</th>
                                <th>Vehicle Type</th>
                                <th>Vehicle Photo</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php
							$i=0;
							@endphp
							@foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$vehicle->vehicleNo}}</td>
                                <td>{{$vehicle->vehicleType}}</td>
                                <td> <img class="img-account-profile rounded-circle mb-2" src="{{url('public/vehicleImages/'.$vehicle->vehiclePhoto)}}" alt=""></td>
                                <td>
                                  <form method="post" action="{{url('/vehicleDelete',$vehicle->id)}}" >
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
@endsection