@extends('admin.admin_master')
@section('title')
Manage Order 
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
                    <th> Order ID</th>
                    <th> Customer Name</th>
                    <th> Order Time</th>
                    <th> Order total</th>
                    <th> Status</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tbody>
         
                <?php $i=1; ?>	
                  @foreach($all_order_info as $v_order)
                <tr>
                    <td>{{ $i++ }}</a></td>
                    <td>{{ $v_order->customer_name }}</td>
                    <td>{{ $v_order->created_at }}</td>
                    <td>{{ $v_order->order_total }}</td>
                     <td>{{ $v_order->order_status }}</td>
               
                    <td>
                        <a href="{{ url('/view-order/'.$v_order->order_id) }}" style="color:white;" title="View Invoice"><button class="btn btn-primary"><i class="icon-eye-open"></i></button></a>
                        <a href="{{ url('/delete-order/'.$v_order->order_id) }}" style="color:white;" onclick="return checkDelete();"><button class="btn btn-danger"><i class="icon-trash "></i></button></a>
                        <a href="{{ url('/generate-pdf/'.$v_order->order_id) }}" style="color:white;" title="Generate PDF file"><button class="btn btn-success"><i class="icon-download"></i></button></a>
                    </td>
                </tr>
                @endforeach
                <tr>
                {{--   <td colspan="5" class="pagination"> {!! $all_order_info->links() !!} </td> --}}
                </tr>
                </tbody>
            </table>
                  
         

        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
</div>


@endsection