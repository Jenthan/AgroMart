
@extends('farmer-dash/base')
@section('main')
<main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Update the Product</h3>
                </div>
                <div class="text-center">
                    <img src="{{url('public/productImage/'.$product->productImg)}}" class="proSize rounded" alt="...">
                </div>
        
                <form method="post" action="{{url('update-product',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="product_name" id="inputEmail3" value="{{$product->productName}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                        <input type="number" name="unitp" class="form-control" id="inputEmail3" value="{{$product->unitPrice}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-10">
                        <input type="number" name="qty" class="form-control" id="inputEmail3" value="{{$product->qty}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category" class="form-control">
                                <option value="{{$product->productType}}">{{$product->productType}}</option>
                                <option value="fruit">fruit</option>
                                <option value="vegetable">Vegetable</option>
                                <option value="milk">Milk</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Update the Product image if need</label>
                        <input type="file" name="proImg" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</main>

@extends('farmer-dash.base')

@section('main')



@endsection