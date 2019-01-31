@extends('admin.admin_master')
@section('title')
Edit Order 
@endsection

@section('mainContent')

<div class="row-fluid">
   <div class="span12">
       <!-- BEGIN BLANK PAGE PORTLET-->
       <div class="widget purple">
           <div class="widget-title">
               <h4><i class="icon-edit"></i> Invoice Page </h4>
             <span class="tools">
                 <a href="javascript:;" class="icon-chevron-down"></a>
                 <a href="javascript:;" class="icon-remove"></a>
             </span>
           </div>
           <div class="widget-body">
               <div class="row-fluid">
                   <div class="span12">
                       <div class="text-center">
                           <img alt="" src="img/vector-lab.jpg">
                       </div>
                       <hr>

                   </div>
               </div>
               <div class="space20"></div>
               <div class="row-fluid invoice-list">
                   <div class="span4">
                       <h5><strong>BILLING ADDRESS</strong></h5> 
                        <table>
                           <tr>
                             <td>Name: </td>
                             <td><strong>{{ $customerData->customer_name }}</strong></td>
                           </tr>
                            <tr>
                             <td>Address: </td>
                             <td>{{ $customerData->customer_address }}</td>
                           </tr>
                            <tr>
                             <td>Phone:  </td>
                             <td>{{ $customerData->customer_phone }}</td>
                           </tr>
                            <tr>
                             <td>City: </td>
                             <td>{{ $customerData->customer_city }}</td>
                           </tr>
                            <tr>
                             <td>Zip: </td>
                             <td>{{ $customerData->customer_zip }}</td>
                           </tr>
                       </table> 
                   </div>
                   <div class="span4">
                       <h5><strong>SHIPPING ADDRESS</h5></strong>
                       <table>
                           <tr>
                             <td>Name: </td>
                             <td><strong>{{ $shippingData->shipping_first_name }} {{ $shippingData->shipping_last_name }}</strong></td>
                           </tr>
                            <tr>
                             <td>Address: </td>
                             <td>{{ $shippingData->shipping_address }}</td>
                           </tr>
                            <tr>
                             <td>Phone:  </td>
                             <td>{{ $shippingData->shipping_phone }}</td>
                           </tr>
                            <tr>
                             <td>City: </td>
                             <td>{{ $shippingData->shipping_city }}</td>
                           </tr>
                            <tr>
                             <td>Zip: </td>
                             <td>{{ $shippingData->shipping_zip }}</td>
                           </tr>
                       </table>
                   </div>
                   <div class="span4">
                       <h5><strong>INVOICE INFO</h5></strong>
    
                       <table>
                           <tr>
                             <td>Invoice Number: </td>
                             <td><strong>{{ $orderData->order_id }}</strong></td>
                           </tr>
                            <tr>
                             <td>Invoice Date: </td>
                             <td>{{ $orderData->created_at }}</td>
                           </tr>
                            <tr>
                             <td>Payment Type: </td>
                             <td>{{ $orderData->payment_type }}</td>
                           </tr>
                            <tr>
                             <td>Order Status: </td>
            <?php
             $orderStatusOption=array(
              'pending'    => 'Pending',
              'processing' => 'Processing',
              'canceled'   => 'Canceled',
              'in_shipment'=> 'In Shipment',
              'complete'   => 'Complete',
              );
            ?>
               <td>{{ Form::select('order_status',$orderStatusOption,$orderData->order_status) }}</td>
                             
                           </tr>
                            <tr>
                             <td>Payment Status: </td>
            <?php
             $paymentStatusOption=array(
              'pending'    => 'Pending',
              'received' => 'Received',
              'canceled'   => 'Canceled',
              );
            ?>         
               <td>{{ Form::select('payment_status',$paymentStatusOption,$orderData->payment_status) }}</td>
                           </tr>
                        
                       </table>
                   </div>
               </div>
               <div class="space20"></div>
               <div class="space20"></div>
               <div class="row-fluid">
                   <table class="table table-striped table-hover">
                       <thead>
                       <tr>
                           <th>Order Details Id</th>
                           <th>Product Name</th>
                           <th class="hidden-480">Product Price</th>
                           <th class="hidden-480">Product Quantity</th>
                           <th>Total</th>
                       </tr>
                       </thead>
                       <tbody>
                @foreach($orderProducts as $v_order)   
                     
                       <tr>
                           <td>{{ $v_order->order_details_id }}</td>
                           <td>{{ $v_order->product_name }}</td>
                           <td class="hidden-480">{{ $v_order->product_price }}</td>
                           <td class="hidden-480">{{ $v_order->product_quantity }}</td>
                           
                           <td>{{ $v_order->product_price*$v_order->product_quantity }}</td>
                       </tr>
               @endforeach     
                       </tbody>
                   </table>
               </div>
               <div class="space20"></div>
               <div class="row-fluid">
                   <div class="span4 invoice-block pull-right">
                       <ul class="unstyled amounts">
                          <li><strong style="margin-right: 50px;">Shipping Charge </strong> BDT 50 </li>
                          <li><strong> Total amount(Including 5% VAT) :</strong> {{ $orderData->order_total }} </li> 
                       </ul>
                   </div>
               </div>
               <div class="space20"></div>
               <div class="row-fluid text-center">
                   <a type="submit" class="btn btn-success btn-large hidden-print"> Update Invoice <i class="icon-check"></i></a>
                   
               </div>
           </div>
       </div>
       <!-- END BLANK PAGE PORTLET-->
   </div>
</div>
<!-- END PAGE CONTENT-->


@endsection   