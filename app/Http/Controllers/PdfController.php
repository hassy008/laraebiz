<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();
use Cart;
use PDF;

class PdfController extends Controller
{
  public function generatePdf($id)
	{
	$orderData= DB::table('order')
    ->join('payment','payment.payment_id','=','order.payment_id')
    ->where('order_id', $id)
    ->select('order.*','payment.payment_type','payment.payment_status')
    ->first();

  $customerData=DB::table('customer')
    ->where('customer_id', $orderData->customer_id)
    ->first();

  $shippingData=DB::table('shipping')
    ->where('shipping_id', $orderData->shipping_id)
    ->first();

  $orderProducts=DB::table('order_details')
    ->join('product','product.id','=','order_details.product_id')
    ->where('order_id', $orderData->order_id)
    ->get();
    
 /* $view_order_page=view('admin.order_details.view-order')
      ->with('orderData', $orderData)
      ->with('customerData', $customerData) 
      ->with('shippingData', $shippingData)
      ->with('orderProducts', $orderProducts);*/


//MUST Write code with array
    $data=array();
    $data['orderData'] = $orderData;
	$data['customerData'] = $customerData;
	$data['shippingData'] = $shippingData;
	$data['orderProducts'] = $orderProducts;

   

  $pdf = \PDF::loadView('admin.order_details.invoice',$data);
  return $pdf->download('invoice.pdf');

	}





}
