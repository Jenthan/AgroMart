@extends('index')

@section('searchbar')
<div id="search">
    <div class="search">
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

@section('sidebar')
<div id="sidebar">
    <section class="category" id="category">

        <h1 class="heading">product <span>category</span></h1>

        <div class="box-container">

            <div class="box">
                <a href="#">
                     <h3>vegitables</h3>
                </a>
                   <a href="#" class="btn">
                      <img src="images/category-1.png" alt="">
                   </a>
            </div>
            <div class="box">
            <a href="#">
                   <h3>juice</h3>
               </a>
                <a href="#"><img src="images/category-2.png" alt=""></a>
            </div>
            <div class="box">
            <a href="#">
                   <h3>meat</h3>
               </a>
                
                  <a href="#" class="btn">
                       <img src="images/category-3.png" alt="">
                  </a>
            </div>
            <div class="box">
            <a href="#">
                   <h3>fruit</h3>
               </a>
                    <a href="#" class="btn">
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
                    <h3>special offer</h3>
                    <p>upto 45% off</p>
                    <a href="#" class="btnno">check out</a>
                </div>
            </div>

            <div class="banner">
                <img src="images/banner-2.jpg" alt="">
                <div class="content">
                    <h3>limited offer</h3>
                    <p>upto 50% off</p>
                    <a href="#" class="btnno">check out</a>
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

<section class="product" id="product">

<h1 class="heading">latest <span>products</span></h1>

<div class="box-container">

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-1.png" alt="">
        <h3>organic banana</h3>
        <div class="price"> Rs10.50</div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
       <button><a href="#" class="btn">add to cart</a></button> 
    </div>

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-2.png" alt="">
        <h3>organic tomato</h3>
        <div class="price"> Rs10.50</div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
        <button><a href="#" class="btn">add to cart</a></button>
        
    </div>

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-3.png" alt="">
        <h3>organic orange</h3>
        <div class="price"> Rs10.50</div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
        <button>
        <a href="#" class="btn">add to cart</a>
        </button>
        
    </div>

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-4.png" alt="">
        <h3>natural mild</h3>
        <div class="price"> Rs10.50</div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
        <button>
        <a href="#" class="btn">add to cart</a>
        </button>
        
    </div>

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-5.png" alt="">
        <h3>organic grapes</h3>
        <div class="price"> Rs10.50  </div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
        <button><a href="#" class="btn">add to cart</a></button>
        
    </div>

    <div class="box">
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images/product-7.png" alt="">
        <h3>organic apple</h3>
        
        <div class="price"> Rs10.50</div>
        <div class="quantity">
            <span>quantity : </span>
            <input type="number" min="1" max="1000" value="1">
            <span> /kg </span>
        </div>
        <button> <a href="#" class="btn">add to cart</a></button>
       
    </div>

</section>

<!-- product section ends -->
</div>
@endsection


