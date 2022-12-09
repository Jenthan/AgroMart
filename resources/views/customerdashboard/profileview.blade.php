@extends('customerdashboard.base')
@section('main')

<main>
    <div class="head-title">
        <div class="left">
		@foreach($customers as $customer)
            <h1>{{$customer->customerName}}'s Profile</h1>
            <ul class="breadcrumb">
                    <a class="active" href="{{url('/customerDashboardIndex')}}">Home</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a  href="#">{{$customer->customerName}}</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="{{route('customerprofileedit',Auth::user()->id)}}">Edit Profile</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
            </ul>            
        </div>
        <a class="btn btn-primary" href="{{route('customerprofileedit',Auth::user()->id)}}">Edit Profile</a>		
    </div> 
    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-12">
            <!-- Account details card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{url('public/customerImage/'.$customer->prophoto)}}" alt="">
                </div>
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small mb-1" for="firstName">Customer Name </label>
                        <input class="form-control" id="firstName" name="firstName" type="text" value="{{$customer->customerName}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="addressNo">Address No</label>
                        <input class="form-control" id="addressNo" name="addressNo" type="text" value="{{$customer->customerAddressNo}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="addressStreet">Address Street</label>
                        <input class="form-control" id="addressStreet" name="addressStreet" type="text" value="{{$customer->customerAddressStreet}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="addressCity">Address City</label>
                        <input class="form-control" id="addressCity" name="addressCity" type="text" value="{{$customer->customerAddressCity}}" readonly>
                    </div>
					@foreach($userphone as $phone)
					<div class="mb-3">
                        <label class="small mb-1" for="addressStreet">Mobile</label>
                        <input class="form-control" id="phone" name="phone" type="text" value="{{$phone->phone}}" readonly>
                    </div>
					@endforeach
					<div class="mb-3">
                        <label class="small mb-1" for="addressStreet">Email</label>
                        <input class="form-control" id="email" name="email" type="text" value="{{$user->email}}" readonly>
                    </div>
                    </div>
                </div>
            </div>
		         
         @endforeach   
<style type="text/css">
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 15rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
        </div>
    </div>
</div>   
</main>
@endsection 