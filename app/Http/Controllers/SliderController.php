<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class SliderController extends Controller
{
    public function addSlider()
    {
    	$add_slider=view('admin.slider.add-slider');
    	return view('admin.admin_master')
    			->with('mainContent', $add_slider);
    }

    public function saveSlider(Request $request)
    {
    	$data=array();
    	$data['slider_name']=$request->sliderName ;
    	$data['slider_description']=$request->sliderDescription ;
    	$data['publicationStatus']=$request->publicationStatus ;

    	/*************[IMAGE UPLOAD]******************/
	$files    = $request->file('sliderImage');
	$filename = $files->getClientOriginalName();
	//$extension= $files->getClientOriginalExtension();
	$picture  =date('His').$filename;
	$image_url='public/slider/'.$picture;
	$destinationPath=base_path().'/public/slider/';
	$success        =$files->move($destinationPath, $picture);

	if ($success) {
    		$data['slider_image']=$image_url;
        	DB::table('slider')->insert($data);
        	return redirect::to('/add-slider')->with('success','Your Slider Added Successfully');
		} 
	else
        {
		$error=$files->getErrorMessage();
	    }
    }

    public function manageSlider(){
    	$all_slider_images=DB::table('slider')
    			->get();

    	$manage_slider=view('admin.slider.manage-slider')
    				->with('all_slider_images', $all_slider_images);

    	return view('admin.admin_master')
    			->with('mainContent', $manage_slider);

    }
    public function unpublishedSlider($slider_id){
    	DB::table('slider')
    		->where('slider_id', $slider_id)
    		->update(['publicationStatus'=>0]);
    	return redirect::to('/manage-slider');	
    }

    public function publishedSlider($slider_id){
    	DB::table('slider')
    		->where('slider_id', $slider_id)
    		->update(['publicationStatus'=>1]);
    	return redirect::to('/manage-slider');	
    }

    public function deleteSlider($slider_id)
    {
    	DB::table('slider')
    		->where('slider_id', $slider_id)
    		->delete();
    	return redirect::to('/manage-slider');	
    }






}
