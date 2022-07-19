@extends('customerindex')
@section('searchbar')
<div id="search">
    <div class="search2">
        <a href="#">
        <div class="icon"></div>
        </a>
            <div class="input">
                    <input type="text" placeholder="Search" id="mysearch">
            </div>
        <span class="clear" onclick="document.getElementById('mysearch').value =''"></span>
    </div>

    
</div>
    
@endsection
@section('content1')
<div class="productsdisplay">
<div class="cardtotal">
        @foreach($products as $product)
        <div class="card">
           <form action="{{url('/card')}}" method="post">
            @csrf
             <div class="image">
                 <img class="avatar" src="{{url('public/productImage/'.$product->productImg)}}" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="{{$product->productName}}" ></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label></br>
                <input type="text" name="pprice" value="Rs. {{$product->unitPrice}}.00"></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="text" name="pid" value="{{$product->id}}"></br><br/>

                <input type="submit" class="btn btn-success" value="Add to card">
            </form>
        </div>
        @endforeach
</div>
</div>

@endsection