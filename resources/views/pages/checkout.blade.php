@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			

			<div class="register-req">
				<p>Please Fillup This Form......</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="save_user_register" method="post">
									{{@csrf_field()}}
									<input type="text" name="email" placeholder="Email Address">
									<input type="text" name="first_name" placeholder="First Name">
									<input type="text" name="last_name" placeholder="Last Name">
									<input type="text" name="address" placeholder="Address">
									<input type="text" name="phone" placeholder="phone">
									<input type="text" name="city" placeholder="City">
									<input type="text" name="zip_code" placeholder="Zip Code">
									<button type="submit" class="button text-center"><span>Done </span></button>
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
		
	</section>
			
<style>
.button {
  border-radius: 4px;
  background-color: orange;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 17px;
  padding: 7px;
  width: 90px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;

  
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

@endsection