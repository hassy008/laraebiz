@extends('admin.admin_master')
@section('title')
Manage Manufacturer
@endsection

@section('mainContent')
<div class="row-fluid">
<div class="span12">
    <!-- BEGIN BASIC PORTLET-->
    <div class="widget orange">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Manage Manufacturer </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
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
<h3>
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
</h3>

            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                <tr>
                    <th width="10%"> ID</th>
                    <th width="20%"> Manufacturer Name</th>
                    <th width="45%">Manufacturer Description</th>
                    <th width="10%"> Status</th>
                    <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
            <?php $i=1; ?>    	
                @foreach($manage_manufacturer_info as $v_manufacturer)	
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $v_manufacturer->manufacturer_name }}</td>
                    <td>{{ $v_manufacturer->manufacturer_description }}</td>
                    <td>
                    <?php 
                      if($v_manufacturer->publicationStatus==1){
                    ?>	
                    	<span class="label label-success label-mini">Published</span>
                    <?php } else{ ?>
                    	<span class="label label-important label-mini">Unpublished</span>
                    <?php } ?>		
                    </td>
                    <td>
                      <?php 
	                    if($v_manufacturer->publicationStatus==1 )
    	                {	
        	          ?>  	
                        <a href="{{ url('/unpublished-manufacturer/'.$v_manufacturer->manufacturer_id) }}"  title="Unpublished Your Manufacturer"><button class="btn btn-danger"><i class="icon-thumbs-down"></i></button></a>
                      <?php } else { ?>
                       <a href="{{ url('/published-manufacturer/'.$v_manufacturer->manufacturer_id) }}"  title="Published Your Manufacturer"><button class="btn btn-success"><i class="icon-thumbs-up"></i></button></a>
                      <?php } ?>  

                        <a href="{{ url('/edit-manufacturer/'.$v_manufacturer->manufacturer_id) }}"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a>
                       
                        <a href="{{ url('/delete-manufacturer/'.$v_manufacturer->manufacturer_id) }}" onclick="return checkDelete();">
                        	<button class="btn btn-danger"><i class="icon-trash "></i></button>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="" class="pagination"> {!! $manage_manufacturer_info->links() !!} </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
</div>

@endsection