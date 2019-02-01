<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">

	<?php 
        $all_social=DB::table('social')   
            ->first();
    ?>				
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> {{ $all_social->phone_number }}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> {{ $all_social->email }}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ $all_social->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{ $all_social->pinterest }}" target="_blank"><i class="fa fa-pinterest" target="_blank"></i></a></li>
								<li><a href="{{ $all_social->linkedIn }}" target="_blank"><i class="fa fa-linkedin" target="_blank"></i></a></li>
								<li><a href="{{ $all_social->youtube }}" target="_blank"><i class="fa fa-youtube" target="_blank"></i></a></li>
								<li><a href="{{ $all_social->google_plus }}" target="_blank"><i class="fa fa-google-plus" target="_blank"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('/') }}"><img src="{{ asset('public/frontEnd/') }}/images/logo.png" alt="" width="139px" height="39px" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<li><a href="{{ url('/profile-customer') }}"> Account</a></li>

								<li><a href="{{ url('/view-wishlist') }}"><i class="fa fa-star"></i> Wishlist({{ App\Wishlist::count() }})</a></li>
					<?php 
						$customer_id=Session::get('customer_id');		
						$shipping_id=Session::get('shipping_id');
						//print_r($customer_id);
						//print_r($shipping_id);
					?>			
					@if($customer_id != NULL && $shipping_id == NULL)			
						<li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
					@elseif($customer_id != NULL && $shipping_id != NULL)			
						<li><a href="{{ url('/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>	
					@else
						<li><a href="{{ url('/login-check') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>	
					@endif		

					<?php 
						$customer_id=Session::get('customer_id');		
						$shipping_id=Session::get('shipping_id');
					?>
					@if($customer_id == Null && $shipping_id == Null)
						
					@else
						<li><a href="{{ url('/show-cart') }}"><i class="fa fa-shopping-cart"></i> Cart({{ Cart::count() }})</a></li>	
					@endif


					<?php 
						$customer_id=Session::get('customer_id');
					?>			
					@if($customer_id != NULL)
						<li><a href="{{ url('/customer-logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
					@else		
						<li><a href="{{ url('/login-check') }}"><i class="fa fa-lock"></i> Login</a></li>
					@endif		
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('/') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
					<?php 
						$customer_id=Session::get('customer_id');
						$shipping_id=Session::get('shipping_id');

						print_r($customer_id);
						print_r($shipping_id);
					?>			
					@if($customer_id != NULL && $shipping_id == NULL)			
						<li><a href="{{ url('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
					@elseif($customer_id != NULL && $shipping_id != NULL)			
						<li><a href="{{ url('/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>	
					@else
					<li><a href="{{ url('/login-check') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>	
					@endif			
										<li><a href="cart.html">Cart</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Product Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
            <?php
                $category_home = DB::table('category')
                    ->where('publicationStatus', 1)
                    ->get(); 
            ?>    	
                                      @foreach($category_home as $h_category) 
                                        <li><a href="{{ url('/product-by-category/'.$h_category->cat_id) }}">{{ $h_category->cat_name }}</a></li>
									  @endforeach 	
                                    </ul>
                                </li> 
					
		
			<?php 
		     	$customer_profile_id=DB::table('customer')
		     		   ->where('customer_id', $customer_id)
                       ->first();
				$customer_id=Session::get('customer_id');
				$customer_name=Session::get('customer_name');
			?>	
					@if($customer_id == NULL)

					@else
						<li><a href="{{ url('/profile-customer/'.$customer_profile_id->customer_id) }}">{{ Session::get('customer_name') }}'s Profile </a></li>
					@endif	

								<li><a href="{{ url('/contact') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->