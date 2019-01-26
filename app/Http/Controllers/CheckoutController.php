<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();
use Cart;
use PDF;

class CheckoutController extends Controller
{
  public function loginCheck()
  {
  	$check_login = view('frontEnd.login.login');
  	return view('frontEnd.master')
  		->with('mainContent', $check_login);
  }

  public function customerRegistration(Request $request)
  {
  	$data= array();
  	$data['customer_name']=$request->customer_name;
  	$data['customer_email']=$request->customer_email;
  	$data['customer_phone']=$request->customer_phone;
  	$data['password']=md5($request->password);

  	$customer_id = DB::table('customer')
  	         ->insertGetId($data);

  	Session::put('customer_id', $customer_id);
  	Session::put('customer_name', $request->customer_name);
  	return redirect('/checkout');         

  }

  public function checkout()
  {
  	$check_out = view('frontEnd.checkout.check-out');
  	return view('frontEnd.master')
  			->with('mainContent', $check_out);
  }

  public function saveShippingDetails(Request $request)
  {
  	$data=array();
  	$data['shipping_first_name']=$request->shipping_first_name ;
  	$data['shipping_last_name']=$request->shipping_last_name ;
  	$data['shipping_email']=$request->shipping_email ;
  	$data['shipping_phone']=$request->shipping_phone ;
  	$data['shipping_address']=$request->shipping_address ;
  	$data['shipping_city']=$request->shipping_city ;
  	$data['shipping_zip']=$request->shipping_zip ;

/*  	echo '<pre>';
  	print_r($data);
  	echo '</pre>';
*/
  	$shipping_id = DB::table('shipping')
  				->insertGetId($data);
  		Session::put('shipping_id', $shipping_id);
  	return redirect('/payment');  			
  }

  public function payment()
  {
  	$payment_method = view('frontEnd.payment.payment');
  	return view('frontEnd.master')
  			->with('mainContent', $payment_method);
  }

//*************payment method********************
  public function saveOrder(Request $request)
  {
  	$payment_type= $request->payment_type;

  	$payment_data=array();
  	$payment_data['payment_type']=$payment_type;
  	$payment_data['payment_status']='pending';
  	
  	$payment_id= DB::table('payment')
  			->insertGetId($payment_data);

  	$order_data=array();
  	$order_data['customer_id'] = Session::get('customer_id') ;
  	$order_data['shipping_id'] = Session::get('shipping_id') ;
  	$order_data['payment_id']  = $payment_id ;
  	$order_data['order_total'] = Session::get('total') ;

  	$order_id= DB::table('order')
  			->insertGetId($order_data);


  	$order_details_data= array();
  	$order_details_data['order_id']= $order_id ;		

  	$contents = Cart::content();
  	foreach($contents as $v_content)
  	{
  	  $order_details_data['product_id']= $v_content->id ;
  	  $order_details_data['product_name']= $v_content->name ;
  	  $order_details_data['product_price']= $v_content->price ;	
  	  $order_details_data['product_quantity']= $v_content->qty ;

  	  $order_details_id= DB::table('order_details')
  			->insertGetId($order_details_data);
  	}	


  	Cart::destroy();
  	if ($payment_type == 'cashOnDelivery') 
  	{
  		$order_complete = view('frontEnd.payment.order-complete');
  		return view('frontEnd.master')
  			->with('mainContent', $order_complete);	
  	} 
  	elseif ($payment_type == 'paypal') 
  	{
  	  return view('frontEnd.payment.paypalhtmlWebsiteStandardPayment');	
  	}
  	elseif ($payment_type =='bkash') 
  	{
      return 'Under Construction Dear Sir/Madam...';	
  	}

  }

//************** admin*******************


//############ CUSTOMER LOGIN ####################################
  public function customerLogin(Request $request)
  {
  	$customer_email=$request->customer_email;
  	$password = md5($request->password);

  	$result = DB::table('customer')
  			->where('customer_email', $customer_email)
  			->where('password', $password)
  			->first();
/*echo '<pre>';
  	print_r($result);
  	echo '</pre>';*/
  	if ($result) 
  	{
  		Session::put('customer_id', $result->customer_id); //here we get the customer_id from [CUSTOMER TABLE]..without this line we dont get our logged in customer_id

		return Redirect::to('/checkout');
	}	
	else
	{
		return redirect('/login-check');
	}
  }


// ******************************* LOGOUT *********************************************
  public function customerLogout()
  {
/*  	Session::put('customer_id');
  	Session::put('customer_name');*/
  	Session::flush(); //remove all the data after logged out 

  	return redirect::to('/');
  }




}
