<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="customer.cusreg.js"></script>
    <script>
        function showPreview(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-1-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
           }
    </script>
    <link rel="stylesheet" href="customer/cusreg.css">

</head>
<body>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

    <form class="border border-success rounded-3" method="post" action="{{url('vendorregistration')}}" enctype="multipart/form-data">
        @csrf

        <h2>Vendor Registration Form</h2> <br>

        <div class="center">
            <div class="form-input">
                <div class="preview">
                    <img id="file-ip-1-preview">
                </div>
                <label for="file-ip-1">Upload Image</label>
                <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" name="prophoto">

            </div>
        </div> 
       

        <div class="row mb-2">
            <label for="fname" class="col-sm-2 col-form-label-sm">First Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="fname" name="fname">
            </div>
        </div>

        <div class="row mb-2">
            <label for="lname" class="col-sm-2 col-form-label-sm">Last Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="lname" name="lname">
            </div>
        </div>

        <div class="row mb-2">
            <label for="address" class="col-sm-2 col-form-label-sm">Address:</label>
            <div class="col-sm-9">
            <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="street" id="address" name="street"></div>
            <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="village" id="address" name="village"></div>
            <input type="text" class="form-control form-control-sm" placeholder="City" id="address" name="city">
            </div>
        </div>

        <div class="row mb-2">
            <label for="phone" class="col-sm-2 col-form-label-sm">Phone:</label>
            <div class="col-sm-9">
            <div class="mb-2"><input type="tel" class="form-control form-control-sm " patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" placeholder="Mobile" name="phoneno"></div>
            </div>
        </div>
<!--
        <div class="row mb-2">
            <label for="vname" class="col-sm-2 col-form-label-sm">Vehicle Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="vname" name="vname">
            </div>
        </div>   -->

        <div class="row mb-2">
            <label for="vtype" class="col-sm-2 col-form-label-sm">Vehicle Type:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="vtype" name="vtype">
            </div>
        </div>

        <div class="row mb-2">
            <label for="vnumber" class="col-sm-2 col-form-label-sm">Vehicle No:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="vnumber" name="vnumber">
            </div>
        </div>

        <div class="row mb-2">
            <label for="vphoto" class="col-sm-2 col-form-label-sm">Vehicle Photo:</label>
            <div class="col-sm-9">
            <input class="form-control form-control-sm" id="vphoto" type="file" name="vphoto">
            </div>
        </div>

        <div class="row mb-2">
            <label for="lphoto" class="col-sm-2 col-form-label-sm">Lisence Photo:</label>
            <div class="col-sm-9">
            <input class="form-control form-control-sm" id="lphoto" type="file" name="lisence">
            </div>
        </div>
   
        <div class="row mb-2">
            <label for="mail" class="col-sm-2 col-form-label-sm">Email:</label>
            <div class="col-sm-9">
            <input type="email" class="form-control form-control-sm" id="mail" name="email">
            </div>
        </div>
        <div class="row mb-2">
            <label for="pword" class="col-sm-2 col-form-label-sm">Password:</label>
            <div class="col-sm-9">
            <input type="password" class="form-control form-control-sm" id="pword" name="password">
            </div>
        </div>

        <div class="row mb-2">
            <label for="confirmpword" class="col-sm-2 col-form-label-sm">Confirm Password:</label>
            <div class="col-sm-9">
            <input type="password" class="form-control form-control-sm" id="confirmpword">
            </div>
        </div>
        <br>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn" type="submit">Sign Up</button>
            
        </div>
    </form>


</body>
</html>