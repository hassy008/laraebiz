<style type="text/css">
  @font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
  width: 750px;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
  min-width: 500px;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: left;
  margin-right: 80px;
  text-align: right;
}

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 40%;
  padding: 10px;
  margin-left:1px;
  margin-bottom:15px;
  height: auto; /* Should be removed. Only for demonstration */
}
.column2{
  float: right;
  width: 40%;
  padding: 10px;
  margin-left:1px;
  margin-bottom:15px;
  height: auto;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>


<div class="row-fluid" style="width: 750px">
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
<header class="clearfix">
      <div id="logo">
        <a href="{{ url('http://localhost/laraebiz') }}"><img src="{{ asset('public/admin/img/invoice.png') }}"></a>
      </div>
      <div id="company">
        <h2 class="name">LaraEbiZ</h2>
        <div>Gulshan-1, Dhaka, Bangladesh</div>
        <div>+880126567</div>
        <div><a href="mailto:contact@laraebiz.com">contact@laraebiz.com</a></div>
      </div>
</header>
           <div class="widget-body">
               <div class="space20"></div>
               <div class="row-fluid invoice-list">
               		  <div class="span4">
                       <h5><strong>INVOICE INFO</h5></strong>
                       <p>
                           Invoice Number : <strong>{{ $orderData->order_id }}</strong><br>
                           Invoice Date   : {{ $orderData->created_at }}<br>
                           Payment Type   : {{ $orderData->payment_type }}<br>
                           Invoice Status : {{ $orderData->payment_status }}
                           
                       </p>
                   </div>
				<div class="row">
				  <div class="column" style="background-color:#fff;">
				    <h5><strong>BILLING ADDRESS</strong></h5>
             <p>
                <strong> Name</strong>: {{ $customerData->customer_name }} <br>
                <strong>  Address</strong>: {{ $customerData->customer_address }}<br>
                <strong> Phone</strong>: {{ $customerData->customer_phone }} <br>
                <strong>City</strong>: {{ $customerData->customer_city }} <br>
                <strong>Zip</strong>: {{ $customerData->customer_zip }}
            </p>   
				  </div>
					  <div class="column2" style="background-color:#fff;">
					    <h5><strong>SHIPPING ADDRESS</h5></strong>
               <p>
                  <strong> Name</strong>: {{ $shippingData->shipping_first_name }} {{ $shippingData->shipping_last_name }}<br>
                 <strong>  Address</strong>: {{ $shippingData->shipping_address }}<br>
                  <strong> Phone</strong>: {{ $shippingData->shipping_phone }}<br>
                  <strong> City</strong>: {{ $shippingData->shipping_city }} <br>
                  <strong>Zip</strong>: {{ $shippingData->shipping_zip }} 
               </p>
					  </div>
				</div>
               <div class="space20"></div>
               <div class="space20"></div>
               <div class="row-fluid">
                  <table id="customers">
    					<thead>
						<tr class="">
                           <th class="text-center">Product Id</th>
                           <th class="text-center">Product Name</th>
                           <th class="hidden-480 text-center">Product Price</th>
                           <th class="hidden-480 text-center">Product Quantity</th>
                           <th class="text-center">Total</th>
                       </tr>
                       </thead>
                       <tbody>
        <?php $i=1;?>                 
                @foreach($orderProducts as $v_order)   
                       <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $v_order->product_name }}</td>
                           <td class="hidden-480" style="text-align: right;">{{ $v_order->product_price }}</td>
                           <td class="hidden-480">{{ $v_order->product_quantity }}</td>
                           <td style="text-align: right;">{{ $v_order->product_price*$v_order->product_quantity }}</td>
                       </tr>
               @endforeach     
                       </tbody>
                   </table>
               </div>
               <div class="space20"></div>
               <div class="row-fluid">
                   <div class="span4 invoice-block pull-right" style="text-align: right; margin-right: 2px; margin-top: 15px;">
                      <strong>Shipping Charge </strong>BDT 50  <br>
                      <strong>Grand Total (Including 5% VAT) :</strong>BDT  {{ $orderData->order_total }}
                       
                   </div>
               </div>
               <div class="space20"></div>
           </div>
       </div>
       <!-- END BLANK PAGE PORTLET-->
   </div>
</div>
<!-- END PAGE CONTENT-->
     
