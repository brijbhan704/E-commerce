@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
                     $contents=Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('update_cart')}}" method="post">
									{{ csrf_field()}}
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$v_contents->qty}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowId" value="{{$v_contents->rowId}}"  >
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
								</form>
							</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">

								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                       <?php }?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="paymentCont col-sm-8">
						<div class="headingWrap">
								<h3 class="headingTop text-center">Select Your Payment Method</h3>	
								
						</div>
						<!-- <div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
					           <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" alt="Check out with PayPal" />       		    
					        </div> 

						</div>-->
				
						<section id="first" class="section">
							<form action="order_place" method="post">
								{{@csrf_field()}}
						    <div class="container">
						      <input type="radio" name="payment_gateway" value="paypal" id="radio-1">
						      <label for="radio-1"><span class="radio">PAYPAL</span></label>
						    </div>
						    <div class="container">
						      <input type="radio" name="payment_gateway" value="cod" id="radio-2">
						      <label for="radio-2"><span class="radio">COD</span></label>
						    </div>
						    <div class="container">
						      <input type="radio" name="payment_gateway" value="pumoney" id="radio-3">
						      <label for="radio-3"><span class="radio">PUMONEY</span></label>
						    </div>
						    <button type="submit" name="" class="btn btn-warning"> CHECKOUT</button>
						    </form>
						</section>
			</div>								
		</div>
	</div>
</section><!--/#do_action-->
<style type="text/css">
	
}
#first {
  background-color: #4B4D65;
}
#second {
  background-color: #FF8A66;
}
.section {
  padding: 100px;
  padding-left: 150px;
}
.section input[type="radio"],
.section input[type="checkbox"]{
  display: none;
}
.container {
  margin-bottom: 10px;
}
.container label {
  position: relative;
}

/* Base styles for spans */
.container span::before,
.container span::after {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
}

/* Radio buttons */
.container span.radio:hover {
  cursor: pointer;
}
.container span.radio::before {
  left: -52px;
  width: 45px;
  height: 25px;
  background-color: #A8AAC1;
  border-radius: 50px;
}
.container span.radio::after {
  left: -49px;
  width: 17px;
  height: 17px;
  border-radius: 10px;
  background-color: #6C788A;
  transition: left .25s, background-color .25s;
}
input[type="radio"]:checked + label span.radio::after {
  left: -27px;
  background-color: #EBFF43;
}

/* Check-boxes */
.container span.checkbox::before {
  width: 27px;
  height: 27px;
  background-color: #fff;
  left: -35px;
  box-sizing: border-box;
  border: 3px solid transparent;
  transition: border-color .2s;
}
.container span.checkbox:hover::before {
  border: 3px solid #F0FF76;
}
.container span.checkbox::after {
  content: '\f00c';
  font-family: 'FontAwesome';
  left: -31px;
  top: 2px;
  color: transparent;
  transition: color .2s;
}
input[type="checkbox"]:checked + label span.checkbox::after {
  color: #62AFFF;
}
</style>
@endsection