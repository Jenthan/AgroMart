
<!DOCTYPE html>


<html>

<head>
 <title>ArgoCat</title>
 <link rel="stylesheet" type="text/css" href="stylegrid.css">
 <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
 <link href="layoutgridcss.css" rel="stylesheet" media="all">
 
 <!-- home css link-->
 <link rel="stylesheet" href="home/homecss.css">
 <link rel="stylesheet" href="allmin.css">
 <link rel="stylesheet" href="home/homelogincss.css">

 <!-- farmer css link  -->
 <link rel="stylesheet" href="farmerpage/farmerdisplay.css">  

 <!-- addtocard css link -->
 <link rel="stylesheet" href="addtocard/OrderDetailStyle.css">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/6929cbd213.js" crossorigin="anonymous"></script>


  <!--  checkout link --->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- select user design -->
    <link rel="stylesheet" href="select/style.css">

    <!--- bootstrap css --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- product dispay css  -->

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="home/css/style.css">

<!-- custom js file link  -->
<script src="home/js/script.js" defer></script>
</head>
<body>

<div class="grid_1">
    <div id="logo">
         
            <img src="images/logo.png" alt="logo">
    </div>
 
 <header id="header">
    <div class="header-2">

       <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="{{url('/')}}">Home</a>
       <!-- <a href="{{url('farmer')}}">Farmer</a> -->
        <a href="{{url('product')}}">Product</a>
      <!--  <a href="{{url('vender')}}">Vender</a>  -->
      
      

    </nav>
    <div class="icons">
        <a onclick="ordersalert()" class="fas fa-shopping-cart"></a>
    <!--  <a href="#" class="fas fa-heart"></a>  -->
        <a href="{{url('homelogin')}}" onclick="pleaselogin()" class="fas fa-user-circle"></a>
    </div>

    </div>
 </header>
 @yield('searchbar')
@yield('sidebar')
@yield('content-1')
@yield('pagination')
@yield('deal')
 
 
 
 


 <footer>
 

        <div class="box-container">

            <div class="box">
                <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>AgroCat</a>
                <p>Come and buy product easy</p>
           
            </div>
            
            <div class="box">
                <h3>our location</h3>
                <div class="links">
                <a>Jaffna</a>
                    <a>Kilinochchi</a>
                    <a>Mullaithivu</a>
                    <a>Vavuniya</a>
                    <a>Batticaloa</a>
                </div>
            </div>

            <div class="box">
                <h3>download app</h3>
                <div class="links">
                    <a href="#">google play</a>
                
                </div>
            </div>


        </div>

        <h1 class="credit"> created by <span> group D </span> | all rights reserved! </h1>

 </footer>
</div>



<!-- custom js file link  -->
<script src="home/homejs.js"></script>

<!-- addtocard link -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
     integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   


     <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html> 







