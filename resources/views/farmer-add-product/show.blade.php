@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Details of the Product</h3>
            </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            <div class="text-center">
                <img class="img-account-profile mb-2" src="{{url('public/productImage/'.$product->productImg)}}" alt="...">
            </div>
    
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name : </label>
                    <div class="col-sm-10">
                        <label class="form-control">{{$product->productName}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Price</label>
                    <div class="col-sm-10">
                        <label class="form-control">Rs. {{$product->unitPrice}}.00</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                        <label class="form-control">{{$product->qty}} kg</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <label class="form-control">{{$product->productType}}</label>
                    </div>
                </div>
        </div>
    </div>
</main>
@endsection