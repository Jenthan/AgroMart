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
							<a  href="#">Add Telephone</a>
						</li>
					</ul>
				</div>
			<!--	<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>   -->
            </div>
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
            <div class="card-body">
                <form action = "{{route('userPhones.store')}}" method="POST">
                    @csrf    
                    
                        <div class="mb-3">
                            <label class="small mb-1" for="mobile">Mobile </label>
                            <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Type Your mobile Number Here...">
                        </div>
                        <button class="btn btn-primary" type="submit">Add Mobile</button>
                </form>
            </div>
		</main>
@endsection