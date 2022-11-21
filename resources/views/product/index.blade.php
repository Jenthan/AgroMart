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
                   <h3>Milk</h3>
               </a>
                <a href="{{url('/searchmilk')}}"><img src="images/category-2.png" alt=""></a>
            </div>
            
            <div class="box">
            <a href="{{url('/searchfruit')}}">
                   <h3>fruits</h3>
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
    
    <div class="cardtotal">
    
        @if(Auth::user() !="null")
            @foreach($products as $product)
            <div class="card">
            
            <form action="{{url('homelogin')}}"method="get">
                <div class="image">
                    <img class="avatar" src="{{url('public/productImage/'.$product->productImg)}}" alt="description of "></br>
                </div>
                
                    <input type="text" name="pname" id="pname" value="{{$product->productName}}" disabled></br><br/>
                    <label for="pprice" name="pprice"><span>Price</span></label>
                    <input type="text" name="pprice" value="Rs. {{$product->unitPrice}}.00" disabled></br><br/>
                    <!--<label for="quantity" name="quantity">Quantity</label>
                    <input type="number" name="quantity" ></br></br>-->
                    
                    <input type="submit" onclick="logincusalert()" class="btn btn-success" value="Add to cart">
                    
                </form>
            </div>
            @endforeach
        @else{
            
            <div class="card">
            @foreach($products as $product)
            <form action="#"method="post">
                <div class="image">
                    <img class="avatar" src="{{url('public/productImage/'.$product->productImg)}}" alt="description of "></br>
                </div>
                
                    <input type="text" name="pname" id="pname" value="{{$product->productName}}" disabled></br><br/>
                    <label for="pprice" name="pprice"><span>Price</span></label>
                    <input type="text" name="pprice" value="Rs. {{$product->unitPrice}}.00" disabled></br><br/>
                    <label for="quantity" name="quantity">Quantity</label>
                    <input type="number" name="quantity" ></br></br>
                    
                    <input type="submit" class="btn btn-success" value="Add to card">
                    
                </form>
                @endforeach
            </div>
            
        }

        @endif

       
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

