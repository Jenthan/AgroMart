@extends('index')

@section('content-1')
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
                <th>Amount</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Carrot</td>
                <td>Ajenthan</td>
                <td>Nallur</td>
                <td>10kg</td>
                <td>600</td>
                <td><button type="button" class="btn btn-primary btn-sm">#</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Banana</td>
                <td>Jenith</td>
                <td>Jaffna</td>
                <td>2kg</td>
                <td>300</td>
                <td><button type="button" class="btn btn-primary btn-sm">#</button></td> 
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: center;">Total</td>
                
                <td>900</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <br>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
       <a href="{{url('checkout')}}"> <button class="btn btn-warning me-md-5" type="button">Checkout Orders</button></a>
        <a href="#"><button class="btn me-md-2" type="button">Done</button></a>
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