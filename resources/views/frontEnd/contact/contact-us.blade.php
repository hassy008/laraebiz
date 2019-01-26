@extends('frontEnd.master')
@section('title')
Contact Details
@endsection
@section('mainContent')

 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				   
{{-- flash success message		 --}}
    <div class="container">
    	@if(session()->has('notification'))
          <div class="row">
          	<div class="alert alert-success">
          	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>		
				<p class="text-center"><strong>Success</strong> {{ session()->get('notification') }}</p>
          	</div>
          </div>
    	@endif
    </div>

					<div id="gmap" class="contact-map">
						<div style="width: 100%; height: 385px;">
							{!! Mapper::render() !!}
						</div>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				
				{{-- <form id="main-contact-form" class="contact-form row" name="contact-form" method="post"> --}}
				{!! Form::open(['url'=>'/post-contact', 'method'=>'post', 'class'=>'contact-form row']) !!}	
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				{!! Form::close() !!}            
				{{-- </form> --}}

	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
			<?php 
		        $all_social=DB::table('social')   
		            ->first();
		    ?>	
								<li>
									<a href="{{ $all_social->facebook }}"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="{{ $all_social->twitter }}"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="{{ $all_social->google_plus }}"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="{{ $all_social->youtube }}"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->


@endsection
