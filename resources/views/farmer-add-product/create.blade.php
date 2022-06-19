@extends('farmer-dash/base')
@section('main')
<main>
    <form method="post" action="{{url('store-product')}}" enctype="multipart/form-data">
        @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="product_name" id="inputEmail3" placeholder="Product Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Price</label>
        <div class="col-sm-10">
        <input type="number" name="unitp" class="form-control" id="inputEmail3" placeholder="Type">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
        <div class="col-sm-10">
        <input type="number" name="qty" class="form-control" id="inputEmail3" placeholder="Price">
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend  class="col-form-label col-sm-2 pt-0">Category</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="gridRadios1" value="fruit" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Fruit
                        </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="gridRadios1" value="vegetable" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Vegetable
                        </label>
                        
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="gridRadios1" value="milk" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Milk
                        </label>
                        
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label for="exampleFormControlFile1">Photo of Product</label>
        <input type="file" name="proImg" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <input type="hidden" name="farmerId" value="{{Auth::User()->id}}">
    <div class="form-group row">
        <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </div>
    </form>
</main>

@endsection