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
    <div class="searcharea">
        <form action="" >
        <h3 class="h3-search">Search Area</h3>
            <div class="list-group">
                
                <ul>
                   <li>
                   <input type="radio"  name="area" id="jaffna" value="jaffna">
                   <label for="jaffna" ><i class="fa fa-heart fa-fw"></i><span>Jaffna</span></label>
                   </li> 
                   <li>
                   <input type="radio"  name="area" id="thirunelvely" value="thirunelvely" >
                   <label for="thirunelvely"><i class="fa fa-heart fa-fw"></i><span>Thirunelvely</span></label>
                   </li>
                   <li>
                   <input type="radio"  name="area" id="colombo" value="colombo">
                   <label for="colombo" ><i class="fa fa-heart fa-fw"></i><span>Colombo</span></label>
                   </li>
                   <li>
                   <input type="radio"  name="area" id="vavuniya" value="vavuniya" >
                   <label for="vavuniya"><i class="fa fa-heart fa-fw"></i><span>Vavuniya</span></label>
                   </li>
                   <li>
                   <input type="radio"  name="area" id="kandy" value="kandy">
                   <label for="kandy"><i class="fa fa-heart fa-fw"></i><span>Kandy</span></label>
                   </li>
                </ul>
            </div>
           
            <button type="submit" class="btn btn-primary ">Search</button>
        </form>
    </div>
</div>
@endsection


@section('content-1')
<div id="content1">
    
    <div class="cardtotal ">
        <div class="card">
            <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{url('venderdisplay')}}" >More...</a>
            </button>
           
        </div>
        <div class="card">
        <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{route('venderdisplay')}}" >More...</a>
            </button>
        </div>
        <div class="card">
        <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{url('venderdisplay')}}" >More...</a>
            </button>
        </div>
        <div class="card">
        <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{url('venderdisplay')}}" >More...</a>
            </button>
        </div>
        <div class="card">
        <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{url('venderdisplay')}}" >More...</a>
            </button>
        </div>
        <div class="card">
        <div class="image">
            <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
            </div>
            <h4>Name : Jenthan</h4>
            <h4>Area : Nallur</h4>
            <button>
                 <a href="{{url('venderdisplay')}}" >More...</a>
            </button>
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
