@extends('customerdashboard.base')
@section('main')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Profile</h1>
            <ul class="breadcrumb">
                    <a class="active" href="{{url('/customerDashboardIndex')}}">Home</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a  href="#">Edit Profile</a>
                </li>
            </ul>            
        </div>			
    </div> 
    <a class="btn btn-primary" href="{{route('customerprofile',Auth::user()->id)}}"><i class='bx bx-chevron-left' ></i>Back</a>
    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
				@foreach($customers as $customer)
                    <form action = "{{route('customeredit',$customer->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf    
					
                        <div class="mb-3">
                            <label class="small mb-1" for="firstName">Customer Name </label>
                            <input class="form-control" id="firstName" name="customerName" type="text" value="{{$customer->customerName}}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="customerAddressNo">Address No</label>
                            <input class="form-control" id="customerAddressNo" name="customerAddressNo" type="text" value="{{$customer->customerAddressNo}}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="customerAddressStreet">Address Street</label>
                            <input class="form-control" id="customerAddressStreet" name="customerAddressStreet" type="text" value="{{$customer->customerAddressStreet}}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="customerAddressCity">Address City</label>
                            <input class="form-control" id="customerAddressCity" name="customerAddressCity" type="text" value="{{$customer->customerAddressCity}}">
                        </div>
						@foreach($usersphone as $userphones)
						<div class="mb-3">
                            <label class="small mb-1" for="customerAddressCity">Mobile number</label>
                            <input class="form-control" patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" name="phone" type="text" value="{{$userphones->phone}}">
                        </div>
						@endforeach
                        <div class="mb-3">
                            <label class="small mb-1" for="image">Edit Profile Photo </label>
                            <input class="form-control" id="image" name = "image" type="file">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Address City</label>
                            <input class="form-control" id="email" name="email" type="text" value="{{$user->email}}">
                        </div>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
					@endforeach
                </div>
            </div>
            
            
<style type="text/css">
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
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