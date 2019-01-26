@extends('frontEnd.master')
@section('title')
Login Please
@endsection 

@section('mainContent')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
				{!! Form::open(['url'=>'customer-login', 'method'=>'post'])	!!}
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="password" placeholder="Password" name="password" />
							<button type="submit" class="btn btn-default">Login</button>
				{!! Form::close() !!}
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						{{-- <form action="#" method="post"> --}}
					{!! Form::open(['url'=>'/customer-registration', 'method'=>'post']) !!}		
							<input type="text" placeholder="Name" name="customer_name" />
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="number" placeholder="Phone Number" name="customer_phone" />
							<input type="password" placeholder="Password" name="password" />
							<button type="submit" class="btn btn-default">Signup</button>
					{!! Form::close() !!}		
						{{-- </form> --}}
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection	