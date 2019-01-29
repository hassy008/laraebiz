<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->authCheck(); 
       $home=view('admin.home.homeContent');
       return view('admin.admin_master')
                ->with('mainContent', $home);
    }

    public function logout()
    {
        Session::put('admin_name','');
        Session::put('admin_id','');

        Session::put('message','You are logged out');
        return redirect::to('/xyz');
    }

    
    /**for Authentication Check Manually**/
    public function authCheck()
    {
      $admin_id=Session::get('admin_id');
      if ($admin_id) 
      {
        return;      
      }  
      else{
        return Redirect::to('/xyz')->send();
      }
    }


}
