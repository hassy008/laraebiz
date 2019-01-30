@extends('admin.admin_master')
@section('title')
Add Alter Images
@endsection


@section('mainContent')

<style>
 tr:hover {background-color: #f5f5f5;}
</style>


<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Alter Images
</i></h4>
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
 	 	{!! Form::open(['url'=>'/save-alt-image', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}


  <table class="table-bordered" style="height: 200px">
    <caption>Product Original Images</caption>

      <tr>
        <td>Product Name: </td>
        <td>
          <input type="text" class="form-control" name="product_name" value="{{ $proInfo[0]->product_name }}">
          <input type="hidden" class="form-control" name="product_id" value="{{ $proInfo[0]->id }}">
        </td>
      </tr>
      <tr>
        <td>Product Image: </td>
        <td>
          <img src="{{ asset('public/products/'.$proInfo[0]->product_image) }}" height="50" width="80">
        </td>
      </tr>

      <tr>
        <td>Upload Image: </td>
        <td>
          <input type="file" name="image" class="form-control" name="product_name" value="{{ $proInfo[0]->product_name }}">
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <input type="submit" name="btn" value="Save Altr Image" class="btn btn-success btn-block">
        </td>
      </tr>

  </table>


 	 	{!! Form::close() !!}
 	 </div>



   <div class="container">
    <h3>All Images</h3>
  @if(count($altImages) != 0)
     <table class="table table-dark">
       <tr>
         <td>Alt Id</td>
         <td>Product Id</td>
         <td>Alt Image</td>
         <td>Status</td>
         <td>Action</td>
       </tr>

 @foreach($altImages as $img)
       <tr>
         <td>{{ $img->id }}</td>
         <td>{{ $img->product_id }}</td>
         <td><img src="{{ asset($img->alt_image) }}" height="50" width="80"></td>
         <td>
          <?php
            if( $img->status == 1 )
            {
          ?>
            <span class="label label-success label-mini">Published</span>
          <?php } else { ?>
            <span class="label label-important label-mini">Unpublished</span>
          <?php } ?>
         </td>
         <td>
        <!--publication-->
        <?php
            if($img->status == 1 )
            {
            ?>
            <a href="{{ url('/unpublished-alt-image/'.$img->id) }}" style="color:white;"><button class="btn btn-danger"><i class="icon-thumbs-down"></i></button></a>
            <?php } else{ ?>
            <a href="{{ url('/published-alt-image/'.$img->id) }}" style="color:white;"><button class="btn btn-success"><i class="icon-thumbs-up"></i></button></a>
            <?php } ?>

        <!--delete-->
          <a href="{{ url('/delete-altImg/'.$img->id) }}" onclick="return checkDelete();"><button class="btn btn-danger"><i class="icon-trash "></i>

          </td>
    @endforeach
       </tr>

     </table>
  @else
  <p class="alert alert-danger">This product have no Alter Images</p>
 @endif

   </div>


<button type="" name="btn" class="btn btn-danger btn-block">
        <a href="{{ url('/manage-product') }}" style="text-decoration: none; color: white;">Back to the Manage Product Page</a>
      </button>
    </div>
  </div>
</div>



@endsection
