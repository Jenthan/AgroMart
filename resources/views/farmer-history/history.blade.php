@extends('farmer-dash/base')
@section('main')
<main>
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>List of Vendors' Requests and Deliveries </h3>
      </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                  <p>{{ $message }}</p>
            </div>
          @endif
            <table>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Customer</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Amount</th>
                  <th>Vendor</th>
                  <th>Order Date</th>
                  <th>Request Date</th>
                  <th>Delivery Date</th>
                  <th>Status</th>
                </tr>
                @php $i = 1 @endphp
                @foreach($hists as $hist)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$hist->customerName}}</td>
                  <td>{{$hist->productName}}</td>
                  <td>{{$hist->qty}}</td>
                  <td>{{$hist->qty * $hist->unitPrice}}</td>
                  <td>{{$hist->firstName}} {{$hist->lastName}}</td>
                  <td>{{$hist->ordertime}}</td>
                  <td>{{$hist->request}}</td>
                  <td>{{$hist->deliverdate}}</td>
                  @if($hist->deliverstatus == "delivered")
                    <td><span class="status completed">Delivered</span></td>
                  @else
                    <td><span class="status process">Processing</span></td>
                  @endif
                </tr>
                @endforeach
              </thead>
            </table>
    </div>
  </div>
</main>
@endsection