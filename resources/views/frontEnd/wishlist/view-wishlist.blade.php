@extends('frontEnd.master')

@section('title')
Your Wish List
@endsection

@section('mainContent')

@if(session('status'))
<div class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('status') }}</b>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('error') }}</b>
</div>
@endif

<div class="features_items"><!--features_items-->
<?php if($products->isEmpty()) {?>
		<img src="{{ asset('public/frontEnd/wishlist-empty.jpg') }}" style="width: 100%; height: 650px; ">
	<?php } else{?>	
<h2 class="title text-center">Wishlist Items</h2>
<div class="col-sm-12">
	
	 @foreach($products as $wlistProduct)	
  <div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
		  <div class="productinfo text-center">
			<img src="{{ asset('public/products/'.$wlistProduct->product_image) }}" style="width: 300px; height: 250px;">
			<h2>TK {{ $wlistProduct->product_price }}</h2>
			<p>{{ $wlistProduct->product_name }}</p>
			<a href="/view-cart/4" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
		  </div>
		  <div class="product-overlay">
			<div class="overlay-content">
				<h2>TK {{ $wlistProduct->product_price }}</h2>
				<a href="{{ url('/') }}"><p>{{ $wlistProduct->product_name }}</p></a>
				<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</div>
		  </div>
		</div>
		<div class="choose">
			<ul class="nav nav-pills nav-justified">
				<li><a href="{{ url('/remove-wishlist/'.$wlistProduct->id) }}" class="btn btn-danger"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>
				<li><a href="{{ url('/view-product/'.$wlistProduct->id) }}"><i class="fa fa-plus-square"></i>view Product</a></li>
			</ul>
		</div>
	</div>
  </div>
	  @endforeach
	  <?php } ?>
</div>
</div>

{{ $products->links() }}



@endsection


