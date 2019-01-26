@extends('admin.admin_master')
@section('title')
Manage Category
@endsection

@section('mainContent')
<div class="row-fluid">
<div class="span12">
    <!-- BEGIN BASIC PORTLET-->
    <div class="widget orange">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Manage Category </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            {{-- <a href="javascript:;" class="icon-remove"></a> --}}
        </span>
        </div>

        <div class="widget-body">
            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                <tr>
                    <th> ID</th>
                    <th> Category Name</th>
                    <th>Category Description</th>
                    <th> Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>	
                  @foreach($manage_category_info as $v_category)
                <tr>
                    <td>{{ $i++ }}</a></td>
                    <td>{{ $v_category->cat_name }}</td>
                    <td>{{ $v_category->cat_description }}</td>
                    <td>
                    	<?php
		                  if( $v_category->publicationStatus==1 ) 
		                  {	
		                ?>	
		                  <span class="label label-success label-mini">Published</span>
		                <?php } else { ?>
						  <span class="label label-important label-mini">Unpublished</span>
						<?php } ?>                	
                    </td>
                    <td>
                  <?php 
                    if($v_category->publicationStatus==1 )
                    {	
                  ?>  
                    <a href="{{ url('/unpublished-category/'.$v_category->cat_id) }}" style="color:white;"><button class="btn btn-danger"><i class="icon-thumbs-down"></i></button></a>
                  <?php } else{ ?>
                    <a href="{{ url('/published-category/'.$v_category->cat_id) }}" style="color:white;"><button class="btn btn-success"><i class="icon-thumbs-up"></i></button></a>
                  <?php } ?>
                        
                        <a href="{{ url('/edit-category/'.$v_category->cat_id) }}" style="color:white;"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a>
                        <a href="{{ url('/delete-category/'.$v_category->cat_id) }}" style="color:white;" onclick="return checkDelete();"><button class="btn btn-danger"><i class="icon-trash "></i></button></a>
                    </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="5" class="pagination"> {!! $manage_category_info->links() !!} </td>
                </tr>
                </tbody>
            </table>
                  
         

        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
</div>


@endsection