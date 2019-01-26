<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();
use Cart;
use PDF;


class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function manageOrder()
      {
        $all_order_info = DB::table('order')
            ->join('customer','customer.customer_id','=','order.customer_id')
            ->join('payment','payment.payment_id','=','order.payment_id')
            ->select('order.*','customer.customer_name','payment.payment_type')
            ->orderBy('order_id', 'desc')
            ->get();
        $manage_order=view('admin.order_details.manage-order')
              ->with('all_order_info', $all_order_info);
        return view('admin.admin_master')
                ->with('mainContent', $manage_order);          
      }
 /* public function manageOrder(){
  // $all_order_info=DB::table('order')
  //   ->join('customer','customer.customer_id','=','order.customer_id')
  //   ->join('payment','payment.payment_id','=','order.payment_id')
  //   ->select('order.*','customer.customer_name','payment.payment_type')
  //   ->get();
    
    $manage_order=view('admin.order_details.manage-order')
            ->orderBy('desc');
          //->with('all_order_info', $all_order_info);
   
    return view('admin.admin_master')
            ->with('mainContent', $manage_order);
}
*/


  public function viewOrder($id)
  {
 /*   $order_by_id=DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->join('order_details','order.order_id','=','order_details.order_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->select('order.*','order_details.*','shipping.*','customer.*')
      //  ->where('order_id', $id)
        //->first();
        ->get();

// echo '<pre>';
// print_r($order_by_id);
// echo '</pre>';

    $view_order=view('admin.order_details.view-order')
          ->with('order_by_id', $order_by_id);
    return view('admin.admin_master')
            ->with('mainContent', $view_order); */

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
    

   //   Session::put('order_details_id', $orderProducts->order_details_id);

      $view_order_page=view('admin.order_details.view-order')
              ->with('orderData', $orderData)
              ->with('customerData', $customerData) 
              ->with('shippingData', $shippingData)
              ->with('orderProducts', $orderProducts);

      return view('admin.admin_master')
                ->with('mainContent', $view_order_page); 
  }


   
}
