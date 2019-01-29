@extends('admin.admin_master')
@section('title')
View Order 
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
                       <p>
                          Name: {{ $customerData->customer_name }} <br>
                          Address: {{ $customerData->customer_address }}<br>
                          Phone: {{ $customerData->customer_phone }}<br>
                          City: {{ $customerData->customer_city }} <strong><br>
                          Zip</strong>: {{ $customerData->customer_zip }}
                        </p>   
                   </div>
                   <div class="span4">
                       <h5><strong>SHIPPING ADDRESS</h5></strong>
                       <p>
                           Name: {{ $shippingData->shipping_first_name }} {{ $shippingData->shipping_last_name }}<br>
                           Address: {{ $shippingData->shipping_address }}<br>
                           Phone: {{ $shippingData->shipping_phone }}<br>
                           City: {{ $shippingData->shipping_city }} <strong><br>
                           Zip</strong>: {{ $shippingData->shipping_zip }}
                           
                       </p>
                   </div>
                   <div class="span4">
                       <h5><strong>INVOICE INFO</h5></strong>
                       <ul class="unstyled">
                          <li>Invoice Number : <strong>{{ $orderData->order_id }}</strong></li>
                          <li>Invoice Date   : {{ $orderData->created_at }}</li>
                          <li>Payment Type   : {{ $orderData->payment_type }}</li>
                          <li>Invoice Status : {{ $orderData->payment_status }}</li>
                       </ul>
                   </div>
               </div>
               <div class="space20"></div>
               <div class="space20"></div>
               <div class="row-fluid">
                   <table class="table table-striped table-hover">
                       <thead>
                       <tr>
                           <th>Product Id</th>
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
                   <a class="btn btn-success btn-large hidden-print"> Submit Your Invoice <i class="icon-check"></i></a>
                   <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
               </div>
           </div>
       </div>
       <!-- END BLANK PAGE PORTLET-->
   </div>
</div>
<!-- END PAGE CONTENT-->


@endsection   