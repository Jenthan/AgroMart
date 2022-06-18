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
					@foreach($products as $product)
					<tr>
						<td>
							<img src="{{url('public/productImage/'.$product->productImg)}}" >
							
							<p>
							<p>{{$product->productName}}</p>
						</td>
						<td>{{$product->productType}}</td>
						<td>{{$product->unitPrice}}</td>
						<td>{{$product->qty}} kg</td>
						<td><a href="" class="status completed">Edit</a>
							<a href="" class="status completed">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</main>
@endsection