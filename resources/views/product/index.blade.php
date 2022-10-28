@extends('index')

@section('searchbar')
<div id="search">
<form method="post" action="{{url('checkhomesearch')}}">
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
    
@endsection

@section('sidebar')
<div id="sidebar">
    <section class="category" id="category">

        <h1 class="heading">product <span>category</span></h1>

        <div class="box-container">

            <div class="box">
                <a href="{{url('/searchVeg')}}">
                     <h3>vegitables</h3>
                </a>
                   <a href="{{url('/searchVeg')}}" class="btn">
                      <img src="images/category-1.png" alt="">
                   </a>
            </div>
            <div class="box">
            <a href="#">
                   <h3>juice</h3>
               </a>
                <a href="{{url('/searchmilk')}}"><img src="images/category-2.png" alt=""></a>
            </div>
            
            <div class="box">
            <a href="{{url('/searchfruit')}}">
                   <h3>fruit</h3>
               </a>
                    <a href="{{url('/searchfruit')}}" class="btn">
                    <img src="images/category-4.png" alt="">
                    </a>
            </div>

        </div>

    </section>

</div>
@endsection




@section('content-1')
<div id="content1">
<div class="container">

<h3 class="title"> organic products </h3>

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
    <img src="{{url('public/productImage/'.$product->productImg)}}" alt="">
    <h3>{{$product->productName}}</h3>

    
    <div class="price">Rs. {{$product->unitPrice}}.00</div>
    <div class="buttons">
        <!--<a href="#" class="buy">buy now</a>  -->
        <a href="#"  class="cart"> <button class ="btn" onclick ="logincusalert()"> <h2>add to cart</h2></button></a>
    </div>
    </div>

    @endforeach
</div>        
</div>
@endsection


@section('pagination')
<div id="content2">
<nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
@endsection

