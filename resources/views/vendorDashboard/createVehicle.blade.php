@extends('vendorDashboard.home')
@section('main')
<main>
    <div class="head-title">
				<div class="left">
					<h1>Deliver Details</h1>
					<ul class="breadcrumb">
							<a class="active" href="{{url('/vendorDashboard')}}">Home</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="{{route('userPhones.index')}}">Telephones</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="{{url('/vehicleIndex')}}">Vehicles</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
							<a  href="#">Add Vehicles</a>
						</li>
					</ul>
				</div>
            </div>
           
            <div class="card-body">
                <form action = "{{url('/storeVehicle')}}" method="POST" enctype="multipart/form-data">
                    @csrf                        
                        <div class="mb-3">
                            <label class="small mb-1" for="vehicleNo">Vehicle Number : </label>
                            <input class="form-control" id="vehicleNo" name="vehicleNo" type="text" placeholder="Type Your vehicle Number Here...">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="vehicleType">Vehicle Type : </label>
                            <input class="form-control" id="vehicleType" name="vehicleType" type="text" placeholder="Type Your vehicle Type Here...">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="vehiclePhoto">Add Your Vehicle Photo : </label>
                            <input class="form-control" id="vehiclePhoto" name = "vehiclePhoto" type="file">
                        </div>
                        <button class="btn btn-primary" type="submit">Add Vehicle</button>
                </form>
            </div>
		</main>
@endsection