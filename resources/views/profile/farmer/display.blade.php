@extends('profile/farmer.index')


@section('searchbar')
<div id="search">


<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        
        <img src="images/user-img.png" width = 125 height = 125 title="images/user-img.png">
        <div class="round">
          <input type="hidden" name="id" value="id">
          <input type="hidden" name="name" value="fname">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>
        <script type="text/javascript">
        document.getElementById("image").onchange = function(){
            document.getElementById("form").submit();
        };
        </script>
        
    
</div>


    
@endsection


@section('sidebar')
<div id="sidebar">
     
       <nav class="profilesidecontent">
            <a href="{{url('farmerloginProfile')}}">FarmerDetails</a>
            <a href="{{url('farmerprofileproduct')}}">ProductDetails</a>
            <a href="#">OrdersDetails</a>
            <a href="{{url('farmeraddproduct')}}">AddProduct</a>
        </nav>
    
   

</div>

@endsection

@section('content-1')
<div id="content1">
    <div class="bg">
        <div class="prodisplay">
            <table>
                <tr>
                    <th> Name </th>
                    <td>Thangathurai Jenthan</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>34, 3rd cross road , Munaitivu</td>
                </tr>
                
                
                <tr>
                    <th>Farm Name</th>
                    <td>Jenthan Vegitable Garden</td>
                </tr>
                <tr>
                    <th>Farm Address</th>
                    <td>3rd cross road, Periya Porativu</td>
                </tr>
               
                <tr>
                    <th>Phone Number</th>
                    <td>0776629607,0756789432</td>
                </tr>
                <tr>
                    <th rowspan="4">Gs Certificate</th>
                    <td>
                        <img src="images/apple.jpg" alt="">
                    </td>
                </tr>
            </table>

            <a href="{{url('farmerprofileedit')}}"><button class="btn btn-primary">Edit</button></a>
        </div>
    </div>
    

</div>
@endsection