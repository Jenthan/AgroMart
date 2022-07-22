@extends('farmer-dash/base')
@section('main')
<main>
    <div class="container-x px-4 mt-4">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Farmer Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <div class="center">
                                <img id="file-ip-1-preview" class="img-account-profile rounded-circle mb-2" src="{{url('FarmerImage/'.$farmer->prophoto)}}" alt="Profile Image">
                            </div>
                                <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <label for="profile" class="btn btn-primary">Upload new image</label>
                            <input class="profile_change" type="file" id="profile" accept="image/*" onchange="showPreview(event);" name="prophoto">
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
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{$farmer->firstName}}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{$farmer->lastName}}">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Farm name</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="{{$farmer->farmName}}">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Location Address</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{$farmer->farmAddressNo}}">
                                        <br>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{$farmer->farmAddressStreet}}">
                                        <br>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{$farmer->farmAddressCity}}">
                                    </div>
                                </div>
                                
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Email Address-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{Auth::User()->email}}">
                                    </div>
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{$userphone->phone}}">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">GS Certificate</label>
                                    <img src="{{url('GsImage/'.$farmer->gsCertificate)}}" alt="No Image Inserted." class="form-control">
                                </div>
                               
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Save changes</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</main>
@endsection