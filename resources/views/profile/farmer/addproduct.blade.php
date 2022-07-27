@extends('profile/farmer.display')

@section('content-1')
<div id="content1">
<div class="bg1">
    <form>

    <h2>Add Product Form</h2> <br>
    
      <div class="upload">
        
        <img src="images/mango.jpg" width = 125 height = 125 title="images/egg.jpg">
        <div class="round">
          <input type="hidden" name="id" value="id">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    
        <script type="text/javascript">
        document.getElementById("image").onchange = function(){
            document.getElementById("form").submit();
        };
        </script>
        
    



<div class="row mb-2">
    <label for="pname" class="col-sm-2 col-form-label-sm">Product Name:</label>
    <div class="col-sm-9">
    <input type="text" class="form-control form-control-sm" id="pname">
    </div>
</div>

<div class="row mb-2">
    <label for="ptype" class="col-sm-2 col-form-label-sm">Product Type:</label>
    <div class="col-sm-9">
    <input type="text" class="form-control form-control-sm" id="ptype">
    </div>
</div>

<div class="row mb-2">
    <label for="quantity" class="col-sm-2 col-form-label-sm">Quantity:</label>
    <div class="col-sm-9">
    <input type="number" class="form-control form-control-sm" id="quantity">
    </div>
</div>

<div class="row mb-2">
    <label for="uniprice" class="col-sm-2 col-form-label-sm">Unit Price:</label>
    <div class="col-sm-9">
    <input type="number" class="form-control form-control-sm" id="uniprice">
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