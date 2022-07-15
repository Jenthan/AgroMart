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
			<div>
				@yield('editpro')
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
							
							<p>{{$product->productName}}</p>
						</td>
						<td>{{$product->productType}}</td>
						<td>Rs. {{$product->unitPrice}}.00</td>
						<td>{{$product->qty}} kg</td>
						<td>
							<a href="{{url('edit-product',$product->id)}}" class="status completed">Edit</a>

							<a href="{{url('delete-product',$product->id)}}" class="status completed">Delete</a>

							<a href="#" class="status completed">Delete</a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</main>
@endsection