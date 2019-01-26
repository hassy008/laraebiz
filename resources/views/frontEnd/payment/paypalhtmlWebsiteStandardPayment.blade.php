<?php
  function convertCurrency($from, $to, $amount){
  $url = file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=' . $from . '_' . $to . '&compact=ultra');
  $json = json_decode($url, true);
  $rate = implode(" ",$json);
  $total = $rate * $amount;
  $rounded = round($total); //optional, rounds to a whole number
  return $total; //or return $rounded if you kept the rounding bit from above
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Website Payment</title>
<link rel="stylesheet" href="css/style.css">
<script language="javascripts" type="text/javascript">
  function paypal_submit(){
   // var actionName='https://www.paypal.com/cgi-bin/webscr';
   var actionName='https://www.sandbox.paypal.com/cgi-bin/webscr';
 // 	var actionName='https://www.sandbox.paypal.com/cgi-bin/webscr';

  	document.forms.frmOrderAutoSubmit.action=actionName;
  	document.forms.frmOrderAutoSubmit.submit();
  }	
</script>
</head>
<!--onload Paypal_submit()-->
<body onload="paypal_submit();">
<form style="padding: 0px; margin:0px;" name="frmOrderAutoSubmit" method="post">
  <input type="hidden" name="return" value="<?//=base_url()?>paymentMethods/payment_utility/paymentSuccess/<?//=$order_row_id?>.html">
  <input type="hidden" name="cancel_return" value="<?//=base_url()?>paymentMethods/payment_utility/cancelExpressCheckoutSale/<?//=$order_row_id?>.html">	
  
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="hasnathrumman12345@gmail.com"> 

<?php
  $customer_id=Session::get('customer_id');
  $shipping_id=Session::get('shipping_id');

    $customer_info=DB::table('customer')
            ->where('customer_id', $customer_id)
            ->first();

    $shipping_info=DB::table('shipping')
            ->where('shipping_id', $shipping_id)
            ->first();        

  $contents = Cart::content();
  $items='';
  foreach($contents as $v_content)
  {
    $items .=$v_content->name.',';
  }
  $amount= Session::get('total');
 
  $dollar_amount=convertCurrency("BDT", "USD", $amount);
?>

  <input type="hidden" name="quantity" value="1">
  <input type="hidden" name="item_name" value="<?php echo $items;?>">
  <input type="hidden" name="amount" value="<?php echo $dollar_amount; ?>">  

  <input type="hidden" name="rm" value="2">
  <input type="hidden" name="address_override" value="0">
  <input type="hidden" name="first_name" value="<?php echo $customer_info->customer_name?>"> 
  <input type="hidden" name="last_name" value="">

  <input type="hidden" name="address1" value="{{ $shipping_info->shipping_address }}">
  <input type="hidden" name="address2" value="{{ $shipping_info->shipping_address }}">
  <input type="hidden" name="city" value="{{ $shipping_info->shipping_city }}">
  <input type="hidden" name="state" value="">
  <input type="hidden" name="zip" value="{{ $shipping_info->shipping_zip }}"> 	

  <input type="hidden" name="night_phone_a" value="{{ $customer_info->customer_phone }}">
  <input type="hidden" name="night_phone_b" value="">
  <input type="hidden" name="night_phone_c" value=""> 	


</form>

</body>
</html>