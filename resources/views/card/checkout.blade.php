@extends('index')

@section('deal')
<div id="deal">
    <div class="container">
    <div class="row mb-3">
        <div class="col input-group">
            <span class="input-group-text">From</span>
            <input type="date" class="form-control">
        </div>
        
        <div class="col input-group">
            <span class="input-group-text">To</span>
            <input type="date" class="form-control">
        </div>
        <div class="col">
            <button type="submit" class="btn">Ok</button>
        </div>
        
    </div>
    <br>
<!--hiii-->
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
            <tr>
                <td>1</td>
                <td>Carrot</td>
                <td>Ajenthan</td>
                <td>Nallur</td>
                <td>10kg</td>
                <td>600</td>
                <td>2022/03/04</td>
                <td>10.15 min</td>
                    
            </tr>
            <tr>
                <td>2</td>
                <td>Banana</td>
                <td>Jenith</td>
                <td>Jaffna</td>
                <td>2kg</td>
                <td>300</td>
                <td>2022/03/04</td>
                <td>05.03 min</td> 
            </tr>
            <tr>
                <td>3</td>
                <td>Milk</td>
                <td>Dulmi</td>
                <td>Jaffna</td>
                <td>2kg</td>
                <td>300</td>
                <td>2022/03/03</td> 
                <td class="cancel">Cancelled</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mango</td>
                <td>Dulmi</td>
                <td>Jaffna</td>
                <td>2kg</td>
                <td>150</td>
                <td>2022/03/03</td> 
                <td class="accept">Accepted</td>
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
                    
                <td>1050</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

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