@extends('admin.admin_master')
@section('title')
Add Product
@endsection

@section('mainContent')

<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Product</i></h4>	
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>
{{-- POP UP MESSAGE BEGAN--}}
@if(Session::has('error'))
  <div class="alert alert-danger alert-icon-left" role="alert">
    <div class="float-xs-left">
      <i class="fa fa-times-circle"></i> <strong> OPPS !!! </strong>{{session::get('error')}}
    </div>
  </div>
@endif

@if(Session::has('success'))
  <div class="alert alert-success alert-icon-left">
    <div class="float-xs-left">
      <i class="fa fa-times-circle"></i> <strong> Successful !!! </strong>{{session::get('success')}}
    </div>
  </div>
@endif
{{-- POP UP MESSAGE END--}}

 	 
 	 <div class="widget-body">
 	 	{!! Form::open(['url'=>'/save-product', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Product Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="productName">	
 	  	</div>
@if ($errors->has('productName'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('productName') }}</strong>
</span>
@endif 
 	  </div>

 <div class="control-group">
 	  	<label class="control-label">Category Name</label>
 	  	<div class="controls">
 	  		<select name="categoryId" class="span6">
 	  			<option>Select Category Name</option>
 	  		@foreach($published_category as $v_cat)	
 	  			<option value="{{ $v_cat->cat_id }}">{{ $v_cat->cat_name }}</option>
 	  		@endforeach	 	  			
 	  		</select>
 	  	</div>
 	  </div>

 	   <div class="control-group">
 	  	<label class="control-label">Manufacturer Name</label>
 	  	<div class="controls">
 	  		<select name="manufacturerId" class="span6">
 	  			<option>Select Manufacturer Name</option>
 	  		@foreach($published_manufacturer as $v_manufacturer)	
 	  			<option value="{{ $v_manufacturer->manufacturer_id }}">{{ $v_manufacturer->manufacturer_name }}</option>
 	  		@endforeach	
 	  		</select>
 	  	</div>
 	  </div>

 	  <div class="control-group" class="span6">
 	  	<label class="control-label">Product Short Description</label>
 	  	<div class="controls">
 	  		<textarea class="ckeditor" rows="2" name="productShortDescription"></textarea>
 	  	</div>
  @if ($errors->has('productShortDescription'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('productShortDescription') }}</strong>
</span>
@endif 
 	  </div>
 	   <div class="control-group" class="span6">
 	  	<label class="control-label">Product Long Description</label>
 	  	<div class="controls">
 	  		<textarea class="ckeditor" rows="5" name="productLongDescription"></textarea>
 	  	</div>
 	@if ($errors->has('productLongDescription'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('productLongDescription') }}</strong>
</span>
@endif   
    </div>

    <div class="control-group">
 	  	<label class="control-label">Product Price</label>
 	  	<div class="controls">
 	  		<input type="number" class="span6" name="productPrice" min="1">	
 	  	</div>
 @if ($errors->has('productPrice'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('productPrice') }}</strong>
</span>
@endif 	  
    </div>
 	  <div class="control-group">
 	  	<label class="control-label">Product Color(Optional)</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="productColor">	
 	  	</div>
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Product Size(Optional)</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="productSize">	
 	  	</div>
 	  </div>

 	  <div class="control-group">
 	  	<label class="control-label">Product Image</label>
 	  	<div class="controls">
 	  		<input type="file" class="span6" name="productImage">	
 	  	</div>
@if ($errors->has('productImage'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('productImage') }}</strong>
</span>
@endif  	  
    </div>

 	  <div class="control-group">
 	  	<label class="control-label">Publication Status</label>
 	  	<div class="controls">
 	  		<select name="publicationStatus"  class="span6">
 	  			<option>Select Product</option>
 	  			<option value="1">Publish</option>
 	  			<option value="0">Unpublish</option>
 	  		</select>
 	  	</div>
  @if ($errors->has('publicationStatus'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('publicationStatus') }}</strong>
</span>
@endif     
 	  </div>	

	<div class="form-actions">
	  <div class="span6">
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Product Info</button>
	  	<button type="submit" name="btn" class="btn btn-danger btn-block">
	  		<a href="{{ url('/dashboard') }}" style="text-decoration: none; color: white;">Cancel</a>	
	  	</button>
	  </div>
	</div>

 	 	{!! Form::close() !!}
 	 </div>
  		
    </div>	
  </div>
</div>


@endsection