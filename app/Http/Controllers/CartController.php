<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$qty=$request->qty;
    	$product_id=$request->product_id;
    	$product_info = DB::table('product')
    			->where('id', $product_id)
    			->first();

    	// echo '<pre>';
    	// print_r($product_info);
    	// echo '</pre>';		

    	$data['qty'] = $qty;
    	$data['id'] = $product_info->id;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
		$data['options']['image'] = $product_info->product_image;

			//Cart::destroy($data);
    	  Cart::add($data);
    	  return redirect::to('/show-cart');		
    	/*$add_cart=view('frontEnd.cart.add-cart');
        return view('frontEnd.master')
                ->with('mainContent', $add_cart);*/
    }

    public function showCart()
    {
    	$all_published_category=DB::table('category')
    			->where('publicationStatus', 1)
    			->get();

    	$manage_published_category=view('frontEnd.cart.add-cart')
    			->with('all_published_category', $all_published_category);
        return view('frontEnd.master')
                ->with('mainContent', $manage_published_category);
    }

    public function deleteCartProduct($rowId)
    {
    	Cart::update($rowId, 0);
    	return redirect::to('/show-cart');
    }

    public function updateCart(Request $request)
    {
    	$rowId= $request->rowId;
    	$qty  = $request->qty;

    	// echo $qty;
    	//  echo '</br>'; 
    	//  echo $rowId; 

    	Cart::update($rowId, $qty);
    	return redirect::to('/show-cart');
    }







    
}
