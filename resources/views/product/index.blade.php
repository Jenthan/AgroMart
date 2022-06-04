@extends('index')

@section('searchbar')
<div id="search">
    <div class="search">
        <a href="#">
        <div class="icon"></div>
        </a>
        
            <div class="input">
                    <input type="text" placeholder="Search" id="farmersearch">
            </div>
        <span class="clear" onclick="document.getElementById('farmersearch').value =''"></span>
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
    
    <div class="cardtotal ">
        <div class="card">
           <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/mango.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="Mango" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
           

           
        </div>


        <div class="card">
        <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/grapes.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="grapes" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
        </div>
        <div class="card">
        <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/egg.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="egg" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
        </div>
        <div class="card">
        <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/banana.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="banana" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
        </div>
        <div class="card">
        <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/bringal.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="bringal" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
        </div>
        <div class="card">
        <form action="#" method="post">
             <div class="image">
                 <img class="avatar" src="images/apple.jpg" alt="description of "></br>
            </div>
            
                <input type="text" name="pname" id="pname" value="apple" disabled></br><br/>
                <label for="pprice" name="pprice"><span>Price</span></label>
                <input type="text" name="pprice" value="Rs.30" disabled></br><br/>
                <label for="quantity" name="quantity">Quantity</label>
                <input type="number" name="quantity" ></br></br>
                <input type="submit" class="btn btn-success" value="Add to card">

            </form>
        </div>
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

