<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form</title>

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

    <form class="border border-success rounded-3" method="post" action="{{url('farmerregistration')}}" enctype="multipart/form-data">
        @csrf

        <h2> Farmer Registration Form</h2> <br>

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
            <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="No/Apartment/Village" id="address" name="no"></div>
            <div class="mb-2"><input type="text" class="form-control form-control-sm" placeholder="Street(optional)" id="address" name="street"></div>
            <input type="text" class="form-control form-control-sm" placeholder="City" id="address" name="city">
            </div>
        </div>

        <div class="row mb-2">
            <label for="cname" class="col-sm-2 col-form-label-sm">Farm Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="farmname" name="farmname">
            </div>
        </div>

        <div class="row mb-2">
            <label for="phone" class="col-sm-2 col-form-label-sm">Phone:</label>
            <div class="col-sm-9">
            <div class="mb-2"><input type="tel" class="form-control form-control-sm " patern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="phone" maxlength="10" placeholder="mobile" name="phoneno"></div>
            </div>
        </div>

        <div class="row mb-2">
            <label for="gsphoto" class="col-sm-2 col-form-label-sm">Gs Certificate:</label>
            <div class="col-sm-9">
            <input class="form-control form-control-sm" id="gsphoto" type="file" name="gsphoto">
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
            <input type="password" class="form-control form-control-sm" id="confirmpword" name="cpassword">
            </div>
        </div>
       
        <br>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn" type="submit">Sign Up</button>
            
        </div>
    </form>


</body>
</html>