@extends('admin.admin_master')
@section('title')
Add Category
@endsection


@section('mainContent')

<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Category</i></h4>	
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
 	 	{!! Form::open(['url'=>'/save-category', 'method'=>'post']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Category Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="categoryName">	
 	  	</div>
@if ($errors->has('categoryName'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('categoryName') }}</strong>
</span>
@endif
 	  </div>


{{-- <div class="control-group">
      <label class="control-label">Category Level</label>
      <div class="controls">
        <select name="parent_id" class="span6">
          <option value="0">Main</option>
   @foreach($level as $v_level)        
          <option value="{{ $v_level->cat_id }}">{{ $v_level->cat_name }}</option>
    @endforeach      
        </select>
      </div>
    </div>  
 --}}


 	  <div class="control-group">
 	  	<label class="control-label">Category Description</label>
 	  	<div class="controls">
 	  		<textarea class="ckeditor" rows="4" name="categoryDescription"></textarea>
 	  	</div>
@if ($errors->has('categoryDescription'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('categoryDescription') }}</strong>
</span>
@endif      
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Publication Status</label>
 	  	<div class="controls">
 	  		<select name="publicationStatus" class="span6">
 	  			<option>Select Category</option>
 	  			<option value="1">Publish</option>
 	  			<option value="0">Unpublish</option>
 	  		</select>
 	  	</div>
 	  </div>	

	<div class="form-actions">
	  <div class="span6">
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>
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