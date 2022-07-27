@extends('profile/farmer.display')

@section('content-1')
<div id="content1">
    <div class="bg1">
    <form>

<h2>Farmer Details Edit Form</h2> <br>

<div class="row mb-2">
    <label for="fname" class="col-sm-2 col-form-label-sm">First Name:</label>
    <div class="col-sm-9">
    <input type="text" class="form-control form-control-sm" id="fname">
    </div>
</div>

<div class="row mb-2">
    <label for="lname" class="col-sm-2 col-form-label-sm">Last Name:</label>
    <div class="col-sm-9">
    <input type="text" class="form-control form-control-sm" id="lname">
    </div>
</div>

<div class="row mb-2">
    <label for="address" class="col-sm-2 col-form-label-sm">Address:</label>
    <div class="col-sm-9">
    <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="No/Apartment/Village" id="address"></div>
    <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="Street(optional)" id="address"></div>
    <input type="text" class="form-control form-control-sm" placeholder="City" id="address">
    </div>
</div>

<div class="row mb-2">
    <label for="phone" class="col-sm-2 col-form-label-sm">Phone:</label>
    <div class="col-sm-9">
    <div class="mb-2"><input type="tel" class="form-control form-control-sm " patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" placeholder="Mobile"></div>
    <input type="tel" class="form-control form-control-sm" patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" placeholder="Office">
    </div>
</div>


<div class="row mb-2">
    <label for="gscertificate" class="col-sm-2 col-form-label-sm">GS Certificate:</label>
    <div class="col-sm-9">
    <input class="form-control form-control-sm" id="gscertificate" type="file">
    </div>
</div>

<div class="row mb-2">
    <label for="mail" class="col-sm-2 col-form-label-sm">Email:</label>
    <div class="col-sm-9">
    <input type="email" class="form-control form-control-sm" id="mail">
    </div>
</div>
<div class="row mb-2">
    <label for="pword" class="col-sm-2 col-form-label-sm">Password:</label>
    <div class="col-sm-9">
    <input type="password" class="form-control form-control-sm" id="pword">
    </div>
</div>

<br>

<div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn" type="button">Done</button>
    
</div>
</form>
    </div>


</div>
@endsection