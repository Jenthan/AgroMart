@extends('farmer-add-product.show')
@section('delete')
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h5>Type DELETE in capital letters to delete the Product</h5>
            </div>
            <form method="post" action="{{url('delete-product',$product->id)}}">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="state" placeholder="Type DELETE for remove the product from your list">
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Confirm to Delete</button>
            </form>
        </div>
    </div>
@endsection