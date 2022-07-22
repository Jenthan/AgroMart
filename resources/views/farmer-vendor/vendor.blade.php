@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3> List of Vendors</h3>
            </div>
            <table>
				<thead>
					<tr>
						<th>Vendor Name</th>
                        <th>Address</th>
						<th>Vehicle Type</th>
						<th>Mobile</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($vendors as $vendor)
                        <tr>
                            <td>
                                <img src="{{url('VendorImage/'.$vendor->prophoto)}}" >
                                
                                <p>{{$vendor->firstName}}</p>
                            </td>
                            <td>{{$vendor->addressNo}}, {{$vendor->addressStreet}}, {{$vendor->addressCity}}</td>
                            <td>{{$vendor->vehicleType}}</td>
                            <td>{{$vendor->phone}}</td>
                            <td><a href="#" class="status completed">SHOW</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection