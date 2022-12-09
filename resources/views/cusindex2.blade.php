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
<<<<<<< HEAD
        

       
        <div class="container">


        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

<div class="products-container">
@php
$i = 0;
@endphp
@foreach($products as $product)

     
<div class="product" data-name="p-{{$i++}}">
      <img src="{{url('public/productImage/'.$product->productImg)}}" alt="">
      <h3>{{$product->productName}}</h3>
      <div class="price">Rs. {{$product->unitPrice}}.00</div>
   
</div>

@endforeach
   
</div>

</div>

<div class="products-preview">
    @php
    $i = 0;
    @endphp
    @foreach($products as $product)
    <div class="preview" data-target="p-{{$i++}}">
    <i class="fas fa-times"></i>

    <form action="{{url('/card')}}" method="post">
            @csrf
             
                 <img class="avatar" src="{{url('public/productImage/'.$product->productImg)}}" alt="description of ">
                <input type="hidden" name="pname" id="pname" value="{{$product->productName}}"  disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label></br>
                <input type="hidden" name="pprice" value="Rs. {{$product->unitPrice}}.00"  disabled></br><br/>
                <h3>{{$product->productName}}</h3>
                 <div class="price">Rs. {{$product->unitPrice}}.00</div>
                 
                <h2> <label for="quantity" name="quantity">Quantity</label>  </h2>
                 
                <div class="ip">
                <input type="number" name="quantity" >
                </div> 
                <input type="hidden" name="pid" value="{{$product->id}}">

                <div class="buttons">
                   <a class="card"><input type="submit" class="btn btn-success" value="Add to card"></a>
                </div>
            </form>
    
    </div>

    @endforeach
</div> 
<!--      
=======
>>>>>>> c1750adc2251048f548b7c4f34f2691cf94553b4
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
{{ $products->Links()}}
</div>

@endsection