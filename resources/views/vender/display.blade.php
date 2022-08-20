@extends('index')

@section('searchbar')
<div id="search">
    <div class="image">
        <img class="avatar" src="farmerpage/vender.jpg" alt="description of ">
    </div>
</div>
@endsection

@section('content-1')
<div id="content1">
    <div class="dis-farmer">
        <div class="dis-detail">
            <label>Full Name : Jenthan </label>
            <label>Address : Thirunelvely Jaffna </label>
            <label>Phone No : 0715689562 </label>
            <label>Farming Area : Nallur </label>
        </div>
        
    </div>         
</div>
@endsection

@section('pagination')
<div id="content2">
  <h4>Today Orders</h4>
    <div class="ordertable">
    <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Weight</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Ajanthan</td>
                    <td>Banana</td>
                    <td>50Kg</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Janith</td>
                    <td>Tomato</td>
                    <td>20Kg</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Senesh</td>
                    <td>Pumking</td>
                    <td>30Kg</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Senesh</td>
                    <td>Pumking</td>
                    <td>30Kg</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Senesh</td>
                    <td>Pumking</td>
                    <td>30Kg</td>
                </tr>
            </tbody>
        </table>
    </div>
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
