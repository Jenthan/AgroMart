@extends('admindashboard.base')
@section('main')
<main>
    <div class="container-x px-4 mt-4">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Customer Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <div class="center">
                                <img id="file-ip-1-preview" class="img-account-profile rounded-circle mb-2" src="{{url('customerImage/'.$customer->prophoto)}}" alt="Profile Image">
                            </div>
                                <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Customer name</label>
                                        <input class="form-control" id="inputFirstName" type="text" disabled value="{{$customer->customerName}}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Location Address</label>
                                        <input class="form-control" id="inputLocation" type="text" disabled value="{{$customer->customerAddressNo}}">
                                        <br>
                                        <input class="form-control" id="inputLocation" type="text" disabled value="{{$customer->customerAddressStreet}}">
                                        <br>
                                        <input class="form-control" id="inputLocation" type="text" disabled value="{{$customer->customerAddressCity}}">
                                    </div>
                                </div>
                                
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Email Address-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" disabled value="{{$user->email}}">
                                    </div>
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                    @foreach($userphone as $up)
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" type="tel" disabled value="{{$up->phone}}">
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                               
                                <!-- Save changes button-->
                               <a href="{{route('back_vendor')}}"><button class="btn btn-primary" type="button">Done</button></a> 
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</main>
@endsection