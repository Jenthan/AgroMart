@extends('customerindex')

@section('deal')
<div id="deal">
    <div class="container">
    
    <!--<div class="row mb-3">
        
        
        <div class="col input-group">
            <span class="input-group-text">date</span>
            <input type="date" class="form-control">
        </div>
        <div class="col">
           <a href="{{url('/searchdate')}}"><button type="submit" class="btn">Ok</button></a> 
        </div>
        
    </div>
    <br> -->
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>NO</th>
                <th>Product Name</th>
                <th>Farmer Name</th>
                <th>Product Area</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Order Date</th>
                <th>Order Accept Time</th>
            </tr>
        </thead>

        <tbody>
        @php
        $idn = 1;
        $ta = 0;
        @endphp
        <tbody>
           
                @foreach($ordert as $ordertp)
                
            <tr>
               
                <td>{{$idn++}}</td>
                <td>{{$ordertp->productName}}</td>
                <td>{{$ordertp->firstName}}</td>
                <td>{{$ordertp->farmAddressCity}}</td>
                <td>{{$ordertp->qty}}</td>
                <td>
                    @php
                    $qty = $ordertp->qty;
                    $up =  $ordertp->unitPrice;
                    $a = $qty*$up;

                    $ta = $ta +$a;
                    @endphp

                    {{$a}}
                </td> 
               
                <td>
                   {{$ordertp->updated_at}}
                </td>
               
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
        <tr>
                <td colspan="5" style="text-align: center;">Total</td>
                
                <td>{{$ta}}</td>
                
            </tr>
        </tfoot>
    </table>
<!--
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
    </nav>   -->

    </div>


</div>
@endsection