@extends('frontEnd.master')
@section('title')
Cart Details
@endsection
@section('mainContent')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ url('/') }}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
<?php
	$contents = Cart::content();
?>
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif




					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
				@foreach($contents as $v_content)		{{-- from cartController --}}
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('/public/products/'.$v_content->options->image) }}" alt="" style="width: 100px; height: 70px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $v_content->name }}</a></h4>
								<p>Product ID: {{ $v_content->id }}</p>
							</td>
							<td class="cart_price">
								<p>TK {{ $v_content->price }}</p>
								
							</td>
							<td class="cart_quantity">
								{{-- <div class="cart_quantity_button">
			     {!! Form::open(['url' => '/update-cart', 'method'=>'post']) !!}	
						<input class="cart_quantity_input" type="text" name="qty" value="{{ $v_content->qty }}" autocomplete="off" size="2">
						<input type="text" name="rowId" value="{{ $v_content->rowId }}">
						<input type="submit" name="btn" value="update">
							
				{!! Form::close() !!}
								</div> --}}

			{!! Form::open(['url'=>'/update-cart', 'method'=>'POST']) !!}
                <div class="color-quality">
                    <div class="color-quality-right">
                    	<input type="hidden" name="product_id" value="{{ $v_content->id }}">
                        <input type="number" name="qty" value="{{ $v_content->qty }}" min="1">
                        <input type="hidden" name="rowId" value="{{ $v_content->rowId }}">
                        <input type="submit" name="btn" value="Update" class="item_add hvr-outline-out button2">
                        <p>Only {{ $v_content->options->stock }} left </p>

                    </div>
                </div>
            {!! Form::close() !!} 
							</td>
							<td class="cart_total">
								<p class="cart_total_price">tk {{ $v_content->total }}</p> {{-- this [total] from package default value --}}
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('/delete-to-cart/'.$v_content->rowId) }}" onclick="return checkDelete();"><i class="fa fa-times"></i></a>
							</td>
						</tr>
				@endforeach		<!--             END FOREACH          -->
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
							<li>VAT 5% <span>
								<?php
								  $subTotal = Cart::subtotal();
								  $subTotal = str_replace(',', '', $subTotal);
								  $subTotal = str_replace('.00','',$subTotal);

								  $vat=(5*$subTotal)/100;
								  echo 'BDT ' .$vat; 
								?>
							</span></li>
							<li>Shipping Cost <span>BDT <?php $shipping_cost=50; echo $shipping_cost; ?></span></span></li>
							<li>Total <span>BDT 
								<?php
								  $total=$subTotal+$vat+$shipping_cost;
								    Session::put('total', $total); //using Session for paypal/other payment
								  echo $total;	
								?>	
								</span>
							</li>

						</ul>
							<a class="btn btn-default update" href="">Update</a>
							
		<?php 
			$customer_id=Session::get('customer_id');
			$shipping_id=Session::get('shipping_id');
		?>
						@if($customer_id != NULL && $shipping_id == NULL)	
							<a class="btn btn-default check_out" href="{{ url('/checkout') }}">Checkout</a>
						@elseif($customer_id != NULL && $shipping_id != NULL)	
							<a class="btn btn-default check_out" href="{{ url('/payment') }}">Checkout</a>	
						@else	
							<a class="btn btn-default check_out" href="{{ url('/login-check') }}">Checkout</a>
						@endif

					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->







@endsection