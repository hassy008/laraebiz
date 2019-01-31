@extends('frontEnd.master')
@section('title')
My Order
@endsection 

@section('mainContent')

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="container">
<h2>Order Details</h2>

<table style="margin-bottom:15px;">
  <tr>

    <th>Date</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Quantity</th>
    <th>Order Status</th>
    <th>View</th>
  </tr>
  @foreach($orders as $v_order)
  <tr>
  	<td>{{ $v_order->created_at }}</td>
    <td>{{ $v_order->product_name }}</td>
    <td>{{ $v_order->product_price }}</td>
    <td>{{ $v_order->product_quantity }}</td>
    <td>{{ $v_order->order_status }}</td>
    <td><a href="{{ url('/track-order/'.$v_order->order_id) }}" title=""><i class="fa fa-map-marker"></i> Track Order</a></td>
  </tr>
    @endforeach
</table>
	
</div>




@endsection 