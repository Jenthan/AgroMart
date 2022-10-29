@extends('home.index')
@section('content-1')
<div id="content1">
    <div class="homeloginform high">
    <h1>Select the suitable User Register form...</h1>
    <a href="{{url('/farmerreg')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Register as a Farmer</button></a> 
    <a href="{{url('/venderreg')}}"><button type="button" class="btn btn-success btn-lg btn-block">Register as a Vendor</button></a>
    <a href="{{url('/customerreg')}}"><button type="button" class="btn btn-secondary btn-lg btn-block">Register as a Customer</button></a>

</div>
</div>

@endsection
