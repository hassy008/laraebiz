@extends('frontEnd.master')
@section('title')
Update Profile
@endsection 

@section('mainContent')
	
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2> {{ Session::get('customer_name') }}  Profile </h2>
		
{!! Form::open(['url'=>'/update-customer-profile', 'method'=>'post']) !!}	

		<input type="hidden" placeholder="ID" name="customer_id" value="{{ $customer_profile_detail->customer_id }}" />
		<input type="text" placeholder="Name" name="customer_name" value="{{ $customer_profile_detail->customer_name }}" />
		<input type="email" placeholder="Email Address" name="customer_email" value="{{ $customer_profile_detail->customer_email }}"/>
		<input type="number" placeholder="Phone Number" name="customer_phone" value="{{ $customer_profile_detail->customer_phone }}"/>
		<input type="text" placeholder="Address" name="customer_address" value="{{ $customer_profile_detail->customer_address }}"/>
		<input type="text" placeholder="City" name="customer_city" value="{{ $customer_profile_detail->customer_city }}"/>
		<input type="text" placeholder="Zip" name="customer_zip" value="{{ $customer_profile_detail->customer_zip }}"/>
		<button type="submit" class="btn btn-default">Update</button>
{!! Form::close() !!}
					</div><!--/sign up form-->

					<div>
						
					</div>
				</div>
				<div class="col-sm-4">
					<a href="{{ url('/my-order') }}" title="My Order"><button class="btn btn-info">My Order</button></a>
				</div>	
			</div>
		</div>

@endsection	