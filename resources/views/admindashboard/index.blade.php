@extends('admindashboard.base')

@section('main')
<main>
    <div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="{{url('/admindash')}}">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{url('/admindash')}}">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$c1}}</h3>
						<p>Total Orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$c2}}</h3>
						<p>Users</p>
					</span>
				</li>
			<!--	<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>  -->
			</ul>



	<div class="row gx-3 mb-3">
	
		<div class="col-md-6">
		<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						
					</div>
					<table>
						<thead>
							<tr>
								<th>CustomerName</th>
								<th>Date Order</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($ors as $or)
							<tr>
								
								<td>
									{{$or->customerName}}
								</td>
								<td>{{$or->update}}</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
           </div>
		</div>
		<!-- Form Group (phone number) -->

		

		</div>
	</div>     

	
			
			
				
		</main>

@endsection