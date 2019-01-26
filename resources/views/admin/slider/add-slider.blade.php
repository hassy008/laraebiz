@extends('admin.admin_master')
@section('title')
Add Slider
@endsection

@section('mainContent')

<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Slider</i></h4>	
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
 	 	{!! Form::open(['url'=>'/save-slider', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Slider Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="sliderName">	
 	  	</div>
@if ($errors->has('sliderName'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('sliderName') }}</strong>
</span>
@endif 
 	  </div>

 	  <div class="control-group" class="span6">
 	  	<label class="control-label">Slider Description</label>
 	  	<div class="controls">
 	  		<textarea class="ckeditor" rows="2" name="sliderDescription"></textarea>
 	  	</div>
  @if ($errors->has('sliderDescription'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('sliderDescription') }}</strong>
</span>
@endif 
 	  </div>
 

 	  <div class="control-group">
 	  	<label class="control-label">Slider Image</label>
 	  	<div class="controls">
 	  		<input type="file" class="span6" name="sliderImage">	
 	  	</div>
@if ($errors->has('sliderImage'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('sliderImage') }}</strong>
</span>
@endif  	  
    </div>

 	  <div class="control-group">
 	  	<label class="control-label">Publication Status</label>
 	  	<div class="controls">
 	  		<select name="publicationStatus"  class="span6">
 	  			<option>Select Slider Status</option>
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
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Slider Image</button>
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
