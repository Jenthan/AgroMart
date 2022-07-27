@extends('farmer-dash/base')
@section('main')
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Change the password for the Account</h3>
            </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            <form method="post" action="{{url('farmer-changepassword',Auth::User()->id)}}">

                    @csrf
                <table>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">Current Password</label></td>

                        <td><input type="password" class="form-control" name="current_password" id="inputEmail3" placeholder="Enter your Old Password"></td>
                    </tr>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">New Password</label></td>
                        <td><input type="password" class="form-control" name="password" id="inputEmail3" placeholder="Enter your New Password"></td>
                    </tr>
                    <tr>
                        <td><label for="inputEmail3" class="col-form-label">Confirm Password</label></td>
                        <td><input type="password" class="form-control" name="con_password" id="inputEmail3" placeholder="Confirm your Password"></td>
                    </tr>
                </table>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection