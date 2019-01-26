<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session; //added by hassy008
session_start();


class SocialController extends Controller
{
  public function social()
  {
  	$all_social_account = DB::table('social')
  				->first();
  	$social_add=view('admin.social.social')
  			->with('all_social_account', $all_social_account);
  			
  	return view('admin.admin_master')
  			->with('mainContent', $social_add);
  }

  public function saveSocialContact(Request $request)
  {
  	$data=array();
  	$data['facebook']=$request->facebook;
	$data['youtube']=$request->youtube;
	$data['instagram']=$request->instagram;
	$data['pinterest']=$request->pinterest;
	$data['twitter']=$request->twitter;
	$data['linkedIn']=$request->linkedIn;
	$data['google_plus']=$request->google_plus;
	$data['skype']=$request->skype;
	$data['phone_number']=$request->phone_number;
	$data['email']=$request->email;

	DB::table('social')
 		->update($data);

 	Session::put('message','Social Account Save Successfully');	
 	return redirect('/social');	

  }

}
