@extends('admin.admin_master')
@section('title')
Manage Product
@endsection

@section('mainContent')
<div class="row-fluid">
<div class="span12">
    <!-- BEGIN BASIC PORTLET-->
    <div class="widget orange">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Manage Product </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
        </div>

        <div class="widget-body">
            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                <tr>
                    <th><i class="icon-bullhorn"></i> Product Name</th>
                    <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                    <th><i class="icon-bookmark"></i> Product Price</th>
                    <th>Product Image</th>
                    <th>Alter Image</th>
                    <th><i class=" icon-edit"></i> Status</th>
                    <th>Action</th>
                </tr>
                </thead>
           
           @foreach($all_product as $v_product)    	

                <tbody>
                <tr>
                    <td>{{ $v_product->product_name }}</td>
                    <td class="hidden-phone">{{ $v_product->product_short_description }}</td>
                    <td>TK {{ $v_product->product_price }} </td>
                    <td><img src="{{ asset('public/products/'.$v_product->product_image) }}" height="50" width="80"> </td>
                    <td>
        <?php
          $img_count=DB::table('alt_images')
            ->where('product_id', $v_product->id)
            ->get();
        ?>            
                    <p>{{ count($img_count) }} images found</p>
                        <a href="{{ url('/add-alt-images/'.$v_product->id) }}" class="btn btn-info" style="border-radius: 20px;"><i class="fa fa-plus"></i>Add</a>
                    </td>

                    <td>
                    <?php
	                  if( $v_product->publicationStatus==1 ) 
	                  {	
	                ?>	
	                  <span class="label label-success label-mini">Published</span>
	                <?php } else { ?>
					  <span class="label label-important label-mini">Unpublished</span>
					<?php } ?> 	

                    <?php 
                      if($v_product->top_product==1)
                      { ?>
                      <span class="label label-success label-mini">Top</span>  
                    <?php  } else{ ?>
                      <span class="label label-important label-mini">None</span>
                    <?php } ?>
                    </td>

                    <td>
						<?php 
						if($v_product->publicationStatus == 1 )
						{	
						?>  
						<a href="{{ url('/unpublished-product/'.$v_product->id) }}" style="color:white;"><button class="btn btn-danger"><i class="icon-thumbs-down"></i></button></a>
						<?php } else{ ?>
						<a href="{{ url('/published-product/'.$v_product->id) }}" style="color:white;"><button class="btn btn-success"><i class="icon-thumbs-up"></i></button></a>
						<?php } ?>

                <!--top product---->
                    <?php 
                        if($v_product->top_product == 1 )
                        {   
                        ?>  
                        <a href="{{ url('/remove-top-product/'.$v_product->id) }}" style="color:white;" title="Remove from top product"><button class="btn btn-danger"><i class="icon-minus-sign"></i></button></a>
                        <?php } else{ ?>
                        <a href="{{ url('/top-product/'.$v_product->id) }}" style="color:white;" title="Add to top product"><button class="btn btn-success"><i class="icon-plus-sign"></i></button></a>
                        <?php } ?>
                <!--top product End---->        

                        <a href="{{ url('/edit-product/'.$v_product->id) }}">
                        	<button class="btn btn-primary"><i class="icon-pencil"></i></button>
						</a>

						<a href="{{ url('/delete-product/'.$v_product->id) }}" onclick="return checkDelete();"><button class="btn btn-danger"><i class="icon-trash "></i></button>
						</a>
                    </td>       
                </tr>
                </tbody>
            @endforeach     
            <tr>
              <td colspan="6" class="pagination"> {!! $all_product->links() !!} </td>
            </tr>
            </table>
        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
</div>

@endsection