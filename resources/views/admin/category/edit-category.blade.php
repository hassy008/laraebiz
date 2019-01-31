@extends('admin.admin_master')
@section('title')
Edit Category
@endsection


@section('mainContent')

<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Edit Category</i></h4>	
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>

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
    
 	 
 	 <div class="widget-body">
 	 	{!! Form::open(['url'=>'/update-category', 'method'=>'post', 'name'=>'editCategoryForm']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Category Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="categoryName" value="{{ $category_info->cat_name }}">	
 	  		<input type="hidden" class="span6" name="categoryId" value="{{ $category_info->cat_id }}">	
 	  	</div>
@if ($errors->has('categoryName'))
<span class="invalid-feedback" role="alert" style="color: red;">
    <strong>{{ $errors->first('categoryName') }}</strong>
</span>
@endif       
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Category Description</label>
 	  	<div class="controls">
 	  		<textarea class="span6" rows="4" name="categoryDescription">{{ $category_info->cat_description }}</textarea>
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
 	  		<select name="publicationStatus" required="">
 	  			<option>Select Category</option>
 	  			<option value="1">Publish</option>
 	  			<option value="0">Unpublish</option>
 	  			
 	  		</select>
 	  	</div>
 	  </div>	

	<div class="form-actions">
	  <div class="span6">
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Update Category Info</button>
	  	<button type="submit" name="btn" class="btn btn-danger btn-block">
	  		<a href="{{ url('/manage-category') }}" style="text-decoration: none; color: white;">Cancel</a>	
	  	</button>
	  </div>
	</div>

 	 	{!! Form::close() !!}
 	 </div>
  		
    </div>	
  </div>
</div>

<script>
  document.forms['editCategoryForm'].elements['publicationStatus'].value='{{ $category_info->publicationStatus }}';
</script>
@endsection