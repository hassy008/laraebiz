<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\redirect;
session_start();

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $all_published_product=DB::table('product')
            ->join('category','product.product_category','=','category.cat_id')
            ->join('manufacturer','product.product_manufacturer','=','manufacturer.manufacturer_id')
            ->select('product.*','category.cat_name','manufacturer.manufacturer_name')
            ->where('product.publicationStatus', 1)
            ->paginate(9);

        //$home=view('frontEnd.home.homeContent');       
        $manage_published_product= view('frontEnd.home.homeContent')
            ->with('all_published_product', $all_published_product);       
        return view('frontEnd.master')
                ->with('mainContent', $manage_published_product);                
    }

    public function contactUs()
    {
       $contact=view('frontEnd.contact.contact-us'); 
       return view('frontEnd.master')
                ->with('mainContent', $contact);
    }

    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'subject' =>'min:5',
            'message' =>'min:10'
        ]);

        $data=array(
            'email'       => $request->email,
            'subject'     =>$request->subject,
            'bodyMessage' =>$request->message
            );

        Mail::send('email.contact',$data, function($message) use($data){
            $message->from($data['email']);
            $message->to('rumman-ffb36c@inbox.mailtrap.io');
            $message->subject($data['subject']);
        });

        session()->flash('notification','Your Email sent successfully. We will contact with you soon ');
        return redirect('/contact');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductByCategory($cat_id)
    {
        $show_product_by_category=DB::table('product')
            ->join('category','product.product_category','=','category.cat_id')
            ->select('product.*','category.cat_name')
            ->where('category.cat_id', $cat_id)
            ->where('product.publicationStatus', 1)
            ->get();
        $manage_product_by_category=view('frontEnd.category.product-by-category')
                    ->with('show_product_by_category', $show_product_by_category);
        
        return view('frontEnd.master')
                ->with('mainContent', $manage_product_by_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productDetailsById($product_id)
    {   $show_product_details=DB::table('product')
            /*->join('category','product.product_category','=','category.cat_id')
            ->join('manufacturer','product.product_manufacturer','=','manufacturer.manufacturer_id')
            ->select('product.*','category.cat_name','manufacturer.manufacturer_name')
            ->where('product.id', $product_id)
            ->where('product.publicationStatus', 1)
            ->first();
*/
            ->join('category','product.product_category','=','category.cat_id')
            ->join('manufacturer','product.product_manufacturer','=','manufacturer.manufacturer_id')
            ->select('product.*','category.cat_name','manufacturer.manufacturer_name')
            ->where('product.id', $product_id)
            ->where('product.publicationStatus', 1)
            ->first();


        $product_details=view('frontEnd.productDetails.view-product')
                ->with('show_product_details', $show_product_details);

        return view('frontEnd.master')
                ->with('mainContent', $product_details);
    }


    public function editCustomerProfile($customer_id)
    {
        $customer_profile_detail=DB::table('customer')
                    ->where('customer_id', $customer_id)
                    ->first();

         Session::put('customer_name', $customer_profile_detail->customer_name);
         Session::put('customer_id', $customer_profile_detail->customer_id);            
       
        $cutomer_profile=view('frontEnd.profile.customer-profile')
                ->with('customer_profile_detail', $customer_profile_detail);
        return view('frontEnd.master')
                ->with('mainContent', $cutomer_profile);                    
    }

    public function updateCustomerProfile(Request $request)
    {
      $this->validate($request,[
          'customer_name'  => 'required',
          'customer_email' => 'required', 
          'customer_phone'  => 'required',
          'customer_address' => 'required', 
          'customer_city'  => 'required',
          'customer_zip' => 'required',  
          ]);
      $data = array();
      $data['customer_name']   = $request->customer_name;
      $data['customer_email']  = $request->customer_email;
      $data['customer_phone']  = $request->customer_phone;
      $data['customer_address'] = $request->customer_address;
      $data['customer_city'] = $request->customer_city;
      $data['customer_zip']  = $request->customer_zip;
      $customer_id           = $request->customer_id; //bring this data from blade.php file

      DB::table('customer')
            ->where('customer_id', $customer_id)
            ->update($data);
            
      session()->flash('message','Your Profile Updated successfully');      
      return redirect::to('/');


    }

   
}