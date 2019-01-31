<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        $add_category=view('admin.category.add-category');
        return view('admin.admin_master')
                ->with('mainContent', $add_category);
    }

    public function saveCategory(Request $request)
    {
      $this->validate($request, [
        'categoryName'        => 'required',
        'categoryDescription' => 'required',
        ]);

      $data=array();
      $data['cat_name']= $request->categoryName;
      $data['cat_description'] = $request->categoryDescription;
      $data['publicationStatus'] = $request->publicationStatus;  
      
        DB::table('category')
           ->insert($data); 

      //  $level=DB::table('category')->where('parent_id', 0)->get();   
    
    Session::put('message','New Category Added Successfully'); 
    return redirect::to('/add-category');
    //                ->with(compact('level'));
    }

    public function manageCategory()
    {
        $manage_category_info=DB::table('category')
                                ->paginate(10);

        $manage_category = view('admin.category.manage-category')
                            ->with('manage_category_info', $manage_category_info);

        return view('admin.admin_master')
                ->with('mainContent', $manage_category);
    }

    public function unpublishedCategory($category_id){

        DB::table('category')
            ->where('cat_id', $category_id)
            ->update(['publicationStatus' => 0]);
        return back()->with('error', 'Category Unpublished Successfully');    
    }

    public function publishedCategory($category_id)
    {
        DB::table('category')
            ->where('cat_id', $category_id)
            ->update(['publicationStatus' => 1]);
        return back()->with('status', 'Category Published Successfully');    
    }

    public function deleteCategory($category_id)
    {
      DB::table('category')
            ->where('cat_id', $category_id)
            ->delete();
      return redirect::to('/manage-category');        
    }

    public function editCategory($category_id)
    {
        $category_info = DB::table('category')
                ->where('cat_id', $category_id)
                ->first();

        $edit_category_info= view('admin.category.edit-category')
                        ->with('category_info', $category_info);
        return view('admin.admin_master')
                ->with('mainContent', $edit_category_info);
    }

    public function updateCategory(Request $request)
    {
        $this->validate($request,[
          'categoryName'        => 'required',
          'categoryDescription' => 'required',  
          ]);

        $data = array();
        $data['cat_name']          = $request->categoryName;
        $data['cat_description']   = $request->categoryDescription;
        $data['publicationStatus'] = $request->publicationStatus;  
        $cat_id                    = $request->categoryId;

        DB::table('category')
            ->where('cat_id', $cat_id)
            ->update($data);
        //return redirect::to('/manage-category');    
        return back()->with('status', 'Category Updated Successfully');    

    }


   
}
