@extends('frontEnd.master')

@section('title')
Payment Method
@endsection

@section('mainContent')


<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  	  <div class="well text text-center text-info">Dear Please Enter Your  Shipping Information Here. Thank You.</div>	
  	</div>	
  </div>	
</div>
<div class="container">
  <div class="row">
	<div class="col-lg-12">
		<h3 class="text-center">Chose your payment type</h3>
		<hr>
	  <div class="well box box-primary">
	{!! Form::open(['url'=>'/save-order', 'method'=>'POST']) !!}  	
	  	<div class="form-group">
	  	  <div class="">
	  	   	<label> <input type="radio" name="payment_type" value="cashOnDelivery">Cash On Delivery</label>
	  	  </div> 	
	  	</div>	
	  	<div class="form-group">
	  	  <div class="">
	  	   	<label><input type="radio" name="payment_type" value="paypal">Paypal</label>			
	  	  </div> 	
	  	</div>	
	  	<div class="form-group">
	  	  <div class="">
	  	   	<label><input type="radio" name="payment_type" value="bkash">Bkash</label>		
	  	  </div> 	
	  	</div>	
	  	<!-- /.box-body -->
	  	<div class="box-footer">
          <button type="submit" class="btn btn-primary btn-block">Submit Order</button> 
        </div>
       {!! Form::close() !!} 
	  </div>	
	</div>
  </div>
</div>







@endsection