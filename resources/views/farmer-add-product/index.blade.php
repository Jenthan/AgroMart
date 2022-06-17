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
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>
</main>
@endsection