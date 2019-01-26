@extends('admin.admin_master')
@section('title')
Add Manufacturer
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Manufacturer</i></h4>	
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>
    <h3 class="text text-center" style="color: green;">
    <?php
      $message=Session::get('message');
      if($message){
      	echo '<b>'.$message.'</b>';
      	Session::put('message');
      }	
    ?>	
    </h3>
 	 
 	 <div class="widget-body">
 	 	{!! Form::open(['url'=>'/save-manufacturer', 'method'=>'post']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Manufacturer Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="manufacturerName">	
 	  	</div>
@if ($errors->has('manufacturerName'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('manufacturerName') }}</strong>
</span>
@endif       
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Manufacturer Description</label>
 	  	<div class="controls">
 	  		<textarea class="span6" rows="4" name="manufacturerDescription"></textarea>
 	  	</div>
@if ($errors->has('manufacturerDescription'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('manufacturerDescription') }}</strong>
</span>
@endif 
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Publication Status</label>
 	  	<div class="controls">
 	  		<select name="publicationStatus" required>
 	  			<option>Select Manufacturer</option>
 	  			<option value="1">Publish</option>
 	  			<option value="0">Unpublish</option>
 	  			
 	  		</select>
 	  	</div>
 	  </div>	

	<div class="form-actions">
	  <div class="span6">
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Manufacturer Info</button>
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
