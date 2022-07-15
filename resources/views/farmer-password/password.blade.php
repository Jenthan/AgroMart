@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Change the password for the Account</h3>
            </div>
            <form method="post" action="#">
                    @csrf
                <table>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">Current Password</label></td>
                        <td> <input type="text" class="form-control" name="product_name" id="inputEmail3" placeholder="Product Name"></td>
                    </tr>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">New Password</label></td>
                        <td> <input type="text" class="form-control" name="product_name" id="inputEmail3" placeholder="Product Name"></td>
                    </tr>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">Confirm Password</label></td>
                        <td> <input type="text" class="form-control" name="product_name" id="inputEmail3" placeholder="Product Name"></td>
                    </tr>
                </table>
               
            </form>
        </div>
    </div>
</main>
@endsection