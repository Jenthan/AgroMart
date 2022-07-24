@extends('customerindex')
@section('searchbar')
<div id="search">
    <div class="search2">
    <form method="get" action="{{url('searchproduct')}}">
        @csrf
        <div class="search">
            <button type="submit" class="icon"></button>
                <div class="input">
                        <input type="text" placeholder="Search product Here...." id="mysearch" name="searchvalue">
                </div>
            <span class="clear" onclick="document.getElementById('mysearch').value =''"></span>
        </div>
        
    </form> 
    </div>

    
</div>
    
@endsection
@section('content1')

<div class="productsdisplay">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
<div class="cardtotal">
        @foreach($products as $product)
        <div class="card">
           <form action="{{url('/card')}}" method="post">
            @csrf
             <div class="image">
                 <img class="avatar" src="{{url('public/productImage/'.$product->productImg)}}" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="{{$product->productName}}"  disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label></br>
                <input type="text" name="pprice" value="Rs. {{$product->unitPrice}}.00"  disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="hidden" name="pid" value="{{$product->id}}"></br><br/>

                <input type="submit" class="btn btn-success" value="Add to card">
            </form>
        </div>
        @endforeach
</div>
</div>

@endsection