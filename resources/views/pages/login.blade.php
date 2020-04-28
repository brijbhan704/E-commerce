@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 ">
					<div class="login-form"><!--login form-->

						<h2>Login to your account</h2>
						<div class="col-12">
			                @if (session('message'))
			                    <div class="alert alert-danger alert-dismissible" role="alert">
			                        {{ session('message') }}
			                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                            <span aria-hidden="true">&times;</span>
			                        </button>
			                    </div>
			                @endif
			            </div>
						<form action="customer_login" method="post">
							{{@csrf_field()}}
							<input type="email" required="" placeholder="Email Address" name="user_email" />
							<input type="password" placeholder="Password" name="user_pass" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="user_register" method="post"  autocomplete="off">
							{{@csrf_field()}}
							<input type="text" placeholder="Name" name="user_name" />
							<input type="email" placeholder="Email Address" name="user_email" />
							<input type="number" placeholder="Phone" name="user_phone" />
							<input type="password" placeholder="Password" name="user_pass" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


@endsection