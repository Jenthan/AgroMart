@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
		<div class="order">
            <div class="head">
                <h3>List of Products</h3>
                <a href="create-product" class="btn-download">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Add Product</span>
				</a>
            </div>
				@if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
				@if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
			<table>
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Total Qty</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($farmer as $farmers)
					@foreach($products as $product)
					
						@if($product->farmer_id == $farmers->id)
						
						<tr>
							<td>
								<img src="{{url('public/productImage/'.$product->productImg)}}" >
								
								<p>{{$product->productName}}</p>
							</td>
							<td>{{$product->productType}}</td>
							<td>Rs. {{$product->unitPrice}}.00</td>
							<td>{{$product->qty}} kg</td>
							<td>
								<a href="{{url('edit-product',$product->id)}}" class="status completed">Edit</a>
								<a href="{{url('show-product',$product->id)}}" class="status completed">Show</a>
							</td>
						</tr>
						@endif
					@endforeach
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</main>
@endsection