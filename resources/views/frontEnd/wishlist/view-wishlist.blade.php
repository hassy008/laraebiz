@extends('frontEnd.master')

@section('title')
Your Wish List
@endsection

@section('mainContent')

<div class="features_items"><!--features_items-->
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
				<a href="/view-cart/4" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</div>
		  </div>
		</div>
		<div class="choose">
			<ul class="nav nav-pills nav-justified">
				<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
				<li><a href="http://localhost/laraebiz/view-product/4"><i class="fa fa-plus-square"></i>view Product</a></li>
			</ul>
		</div>
	</div>
  </div>
	  @endforeach
</div>
</div>

{{ $products->links() }}



@endsection


