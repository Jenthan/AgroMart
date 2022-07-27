@extends('customerindex')

@section('content1')
<div id="deal">
    <div class="container">
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>NO</th>
                <th>Product Name</th>
                <th>Farmer Name</th>
                <th>Product Area</th>
                <th>Quantity</th>
                <th>unitPrice</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>

        @php
        $idn = 1;
        $ta = 0;
        @endphp
        <tbody>
           
                @foreach($ordertemp as $ordertp)
                @if($ordertp->orderstatus == 'notconfirmed')
            <tr>
               
                <td>{{$idn++}}</td>
                <td>{{$ordertp->productName}}</td>
                <td>{{$ordertp->firstName}}</td>
                <td>{{$ordertp->farmAddressCity}}</td>
                <td>{{$ordertp->qty}}</td>
                <td>{{$ordertp->unitPrice}}</td>
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
                    <a href="#"><button type="button" class="btn btn-primary btn-sm">Remove</button></a>
                    <a href="{{route('done',$ordertp->id)}}"><button type="button" class="btn btn-primary btn-sm">Done</button></a>
            </td>
            </tr>
            @endif
            @endforeach
       
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: center;">Total</td>
                
                <td>{{$ta}}</td>
                
            </tr>
        </tfoot>

    </table>
    <br>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
       <a href="{{url('/cardcheckout')}}"> <button class="btn btn-warning me-md-5" type="button">Checkout Orders</button></a>
    </div>
    
    <br>

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

</div>
@endsection