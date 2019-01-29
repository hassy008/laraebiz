<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\DB;
//use Symfony\Component\Routing\Matcher\redirect;
use Session; //this sesson work when you put any link/ enter any page
session_start(); //when you press back button....it's browser back button

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->adminAuthCheck(); 
       return view('admin.login.login');
    }

    public function adminLogin(Request $request)
    {
        $email=$request->admin_email;
        $password=$request->password;
        
        $result = DB::table('admin')
                ->where('admin_email', $email)
                ->where('password', md5($password))
                ->first();
        if ( $result ) 
        {
            Session::put('admin_name', $result->admin_name); //for showing name at home.blade.php
            Session::put('admin_id', $result->admin_id);
          //  return view('admin.admin_master');
          return redirect::to('/dashboard');            
        }  
        else {
            Session::put('exception', 'Email or Password Not Matched!');
           return redirect::to('/xyz'); 
        }          
    }

    public function adminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if ($admin_id) 
        {
          return redirect::to('/dashboard')->send();    //if i'm logged in....
        } else{
            return;
        }
    }

  
}
