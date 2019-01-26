@extends('admin.admin_master')
@section('title')
Manage Slider
@endsection

@section('mainContent')

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN BASIC PORTLET-->
    <div class="widget orange">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Manage Slider </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
        </div>

        <div class="widget-body">
            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                <tr>
                    <th><i class="icon-bullhorn"></i> Slider ID</th>
                    <th class="hidden-phone"><i class="icon-question-sign"></i>Slider Name</th>
                    <th><i class="icon-bookmark"></i> Slider Descrition</th>
                    <th><i class="icon-bookmark"></i> Slider Image</th>
                    <th><i class=" icon-edit"></i> Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i=1 ; ?>
@foreach($all_slider_images as $v_slider)
                <tr>
                    <td><a href="#">{{ $i++ }}</a></td>
                    <td class="hidden-phone">{{ $v_slider->slider_name }}</td>
                    <td>{{ $v_slider->slider_description }} </td>
                    <td><img src="{{ asset($v_slider->slider_image) }}" height="50" width="80"></td>
                    <td>
                    <?php
	                  if( $v_slider->publicationStatus==1 ) 
	                  {	
	                ?>	
	                  <span class="label label-success label-mini">Published</span>
	                <?php } else { ?>
					  <span class="label label-important label-mini">Unpublished</span>
					<?php } ?> 	
                    </td>
                    <td>
                        <?php 
						if($v_slider->publicationStatus==1 )
						{	
						?>  
						<a href="{{ url('/unpublished-slider/'.$v_slider->slider_id) }}" style="color:white;"><button class="btn btn-danger"><i class="icon-thumbs-down"></i></button></a>
						<?php } else{ ?>
						<a href="{{ url('/published-slider/'.$v_slider->slider_id) }}" style="color:white;"><button class="btn btn-success"><i class="icon-thumbs-up"></i></button></a>
						<?php } ?>


						<a href="{{ url('/delete-slider/'.$v_slider->slider_id) }}" onclick="return checkDelete();"><button class="btn btn-danger"><i class="icon-trash "></i></button>
						</a>                    </td>
                </tr>
@endforeach                

                </tbody>
            </table>
        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
</div>




@endsection