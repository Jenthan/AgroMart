@extends('vendorDashboard.home')
@section('main')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Profile</h1>
            <ul class="breadcrumb">
                    <a class="active" href="{{url('/vendorDashboard')}}">Home</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a  href="#">Edit Profile</a>
                </li>
            </ul>            
        </div>			
    </div> 
    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="vendorName">Name </label>
                            <input class="form-control" id="vendorName" type="text" value="{{$vendor->vendorName}}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="vendorName">Name </label>
                            <input class="form-control" id="vendorName" type="text" value="{{$vendor->vendorName}}">
                        </div>
                        <!-- Form Row-->
                        
                
                        <!-- <div class="row gx-3 mb-3"> 
            
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                            </div>
                 
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                            </div>
                        </div>
                
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                        </div>
                      
                        <div class="row gx-3 mb-3">
                       
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                            </div>
               
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                            </div>
                        </div> -->
              
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   
</main>
@endsection