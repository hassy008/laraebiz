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

<table>
  <tr>

    <th>Date</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Quantity</th>
    <th>Order Status</th>
    <th>View</th>
  </tr>
  @foreach($orders as $v_ord)
  <tr>
  	<td>{{ $v_ord->created_at }}</td>
    <td>{{ $v_ord->product_name }}</td>
    <td>{{ $v_ord->product_price }}</td>
    <td>{{ $v_ord->product_quantity }}</td>
    <td>{{ $v_ord->order_status }}</td>
    <td><a href="{{ url('/track-order') }}" title=""></a>Track Order</td>
  </tr>
    @endforeach
</table>
	
</div>




@endsection 