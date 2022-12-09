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
            <a href="{{url('/searchmilk')}}">
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
    
      <img src="images/home-img.png" alt="">

    <div class="content">
        <span>fresh and organic</span>
        <h3>your daily need products</h3>
        <div class="btnn">
             <button><a href="{{url('homelogin')}}">get started</a></button>
        </div>
    </div> 
         <!--  flash deal start -->
         <section class="banner-container">

            <div class="banner">
                <img src="images/banner-1.jpg" alt="">
                <div class="content">
                    <h3>Least Unit Price</h3>
                    <p>Vegitables</p>
                    <a href="{{url('/leastveg')}}" class="btnno">check out</a>
                </div>
            </div>

            <div class="banner">
                <img src="images/banner-2.jpg" alt="">
                <div class="content">
                <h3>Least Unit Price</h3>
                    <p>Fruits</p>
                    <a href="{{'/leastfruit'}}" class="btnno">check out</a>
                </div>
            </div>
        </section>
<!-- flash deal end  -->

   
</div>
@endsection

@section('pagination')
<div id="content2">
   </div>
@endsection

@section('deal')
   <div id="deal">
   <!-- product section starts  -->

<div class="container">

<h3 class="title"> Latest products </h3>

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
<!-- product section ends -->
</div>
@endsection


