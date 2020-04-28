@extends('layout')
@section('content')
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Thank You For This Order</strong> We Will Contact You As Soon As Possible </p>
  <hr>
  <p>
   Your Order Number is <a href="">{{$order_number}}</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{URL::to('/')}}" role="button">Continue to Shoping</a>
  </p>
</div>
<?php Cart::destroy(); ?>

@endsection