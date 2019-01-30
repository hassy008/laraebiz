<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        $published_category=DB::table('category')
                    ->where('publicationStatus', 1)
                    ->get();
        $published_manufacturer=DB::table('manufacturer')
                        ->where('publicationStatus', 1)
                        ->get();
        $add_product = view('admin.product.add-product')
                        ->with('published_category', $published_category)
                        ->with('published_manufacturer', $published_manufacturer);
        return view('admin.admin_master')
                ->with('mainContent', $add_product);
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request, [
        'productName'=> 'required',
        'productShortDescription' => 'required',
        'productLongDescription' => 'required',
        'productPrice' => 'required',
        'productImage' => 'required',
        'publicationStatus' => 'required',
        ]);
      try {
        $data = array();
        $data['product_name']         =$request->productName ;
        $data['product_category']     =$request->categoryId ;
        $data['product_manufacturer'] =$request->manufacturerId ;
        $data['product_short_description']=$request->productShortDescription ;
        $data['product_long_description'] =$request->productLongDescription ;
        $data['product_price']        =$request->productPrice ;
        $data['stock']                =$request->productStock;
        $data['product_color']        =$request->productColor ;
        $data['product_size']         =$request->productSize ;
        $data['publicationStatus']    =$request->publicationStatus ;

//----------------START IMAGE UPLOAD--------------//
        $image=$request->file('productImage');
        if ($image) {
          $file_size=$image->getClientSize();
          $name= str_random(20);
          $extension = $image->getClientOriginalExtension();
          $image_name= $name.'.'.$extension;
          $upload_path='public/products/';
          //------------check image format------------//
          if ($extension == 'jpg' || $extension == 'png' ||$extension == 'jpeg' ) {
            //-------check file size-------//
            if ($file_size<51200000) {
              $success = $image->move($upload_path, $image_name);
              $data['product_image'] = $image_name;
              $result = DB::table('product')
                      ->insert($data);
              } else{
                  exit();
                  return redirect::to('add-product')->with('error', 'Max file size not more than 5MB');
              }
          }
          else {
            return redirect::to('add-product')->with('error', 'You have to put right file type( jpg/png/jpeg ) only');
          }
        }
        else{
            $result = DB::table('product')
                     ->insert($data);
        }
        //--------End Image Upload------//
        if ($result) {
          return redirect::to('add-product')->with('success', 'Upload New Product');
        } else {
          return redirect::to('add-product')->with('error', 'Some Error');
        }
    } catch (\Exception $e) {
        $err_msg= \Lang::get($e->getMsg());
        return redirect::to('add-product')->with('error', $err_msg);
        }
    }

    public function manageProduct()
    {
      $all_product=DB::table('product')
                     ->paginate(10);
      $manage_product=view('admin.product.manage-product')
                        ->with('all_product', $all_product);
      return view('admin.admin_master')
                ->with('mainContent', $manage_product);

    }

//******************Published/Unpublished*********************//
    public function unpublishedProduct($product_id)
    {
      DB::table('product')
            ->where('id', $product_id)
            ->update(['publicationStatus'=>0]);
      return redirect::to('/manage-product');
    }

    public function publishedProduct($product_id)
    {
        DB::table('product')
            ->where('id', $product_id)
            ->update(['publicationStatus'=>1]);
        return redirect::to('/manage-product');
    }

//******************TOP PRODUCT*********************//
  public function topProduct($product_id)
    {
      DB::table('product')
        ->where('id', $product_id)
        ->update(['top_product'=>1]);
      return redirect::to('/manage-product');
    }

    public function removeTopProduct($product_id)
    {
      DB::table('product')
        ->where('id', $product_id)
        ->update(['top_product'=>0]);
      return redirect::to('/manage-product');
    }


//******************Delete PRODUCT*********************//
    public function deleteProduct($product_id)
    {
        DB::table('product')
            ->where('id', $product_id)
            ->delete();
        return redirect::to('/manage-product');
    }

//******************EDIT PRODUCT*********************//
    public function editProduct($product_id)
    {
    $published_category=DB::table('category')
                    ->where('publicationStatus', 1)
                    ->get();
    $published_manufacturer=DB::table('manufacturer')
                        ->where('publicationStatus', 1)
                        ->get();
    $product_info = DB::table('product')
            ->where('id', $product_id)
            ->first();

        $edit_product = view('admin.product.edit-product')
                ->with('product_info', $product_info)
                ->with('published_category', $published_category)
                ->with('published_manufacturer', $published_manufacturer);

        return view('admin.admin_master')
                ->with('mainContent', $edit_product);
    }

//******************UPDATE PRODUCT*********************//
    public function updateProduct(Request $request)
    {
      try {
        $data = array();
        $data['product_name']=$request->productName ;
        $data['product_category']=$request->categoryId ;
        $data['product_manufacturer']=$request->manufacturerId ;
        $data['product_short_description']=$request->productShortDescription ;
        $data['product_long_description']=$request->productLongDescription ;
        $data['product_price']=$request->productPrice ;
        $data['product_color']=$request->productColor ;
        $data['product_size']=$request->productSize ;
        $data['publicationStatus']=$request->publicationStatus ;

//----------------START IMAGE UPLOAD--------------//
          $image=$request->file('productImage');
        if ($image) {
          $file_size=$image->getClientSize();
          $name= str_random(20);
          $extension = $image->getClientOriginalExtension();
          $image_name= $name.'.'.$extension;
          $upload_path='public/products/';
          //------------check image format------------//
          if ($extension == 'jpg' || $extension == 'png' ||$extension == 'jpeg' ) {
            //-------check file size-------//
            if ($file_size<51200000) {
              $success = $image->move($upload_path, $image_name);
              if ($request->last_image_path) {
                $old_image_path= $request->last_image_path;
                unlink('public/products/'.$old_image_path);
              }
              $data['product_image'] = $image_name;
              $result = DB::table('product')
                        ->where('id', $request->productId)
                        ->update($data);
              } else{
                  exit();
                  return redirect::to('edit-product')->with('error', 'Max file size not more than 5MB');
              }
          }
          else {
            return redirect::to('edit-product')->with('error', 'You have to put right file type( jpg/png/jpeg ) only');
          }
        }
        else{
            $data['product_image'] = $request->last_image_path;
            $result = DB::table('product')
                      ->where('id', $request->productId)
                      ->update($data);
        }
        //--------End Image Upload------//
        if ($result) {
          return redirect::to('edit-product/'.$request->productId)->with('success', 'Update Product Successfully');
        } else {
          return redirect::to('edit-product/'.$request->productId)->with('error', 'Some Error');
        }
    } catch (\Exception $e) {
        $err_msg= \Lang::get($e->getMsg());
        return redirect::to('edit-product/'.$request->productId)->with('error', $err_msg);
        }
    }

//################ [create ALTER IMAGES .... ]
    public function addAlterImages($id)
    {
      $proInfo = DB::table('product')
                  ->where('id', $id)
                  ->get();

//fetch uploaded images from database
      $altImages=DB::table('alt_images')
      ->where('product_id', $proInfo[0]->id)
      ->get();

////////////////////////////////
      // $show_alt_images = DB::table('alt_images')
      // ->where('product_id', $show_product_details->id)
      // ->where('status', 1)
      // ->get();

      $alter_image = view('admin.product.add-alter-image')
                    ->with('proInfo', $proInfo)
                    ->with('altImages', $altImages);
                  //  ->with('show_alt_images', $show_alt_images);

      return view('admin.admin_master')
            ->with('mainContent', $alter_image);
      // return view('admin.product.add-alter-image',compact('proInfo'));
    }

    public function saveAlterImages(Request $request)
    {
      $data=array();
      $data['product_id']=$request->product_id ;


      $files    = $request->file('image');
      $filename = $files->getClientOriginalName();
     // $extension= $files->getClientOriginalExtension();
      $picture  =date('His').$filename;
      $image_url='public/products/alt_image/'.$picture;
      $destinationPath=base_path().'/public/products/alt_image/';
      $success        =$files->move($destinationPath, $picture);


      if($success){
      $data['alt_image']=$image_url ;
      $add_image = DB::table('alt_images')
              ->insert($data);
       return back()->with('message','New Altr Images Added Successfully');

      }
      else
        {
        $error=$files->getErrorMessage();
        }
    }

    public function deleteAlterImages($id)
    {
      DB::table('alt_images')
      ->where('id', $id)
      ->delete();
      return back()->with('message','Images Deleted Successfully');
    }

    public function unpublishedAltImage($id)
    {
      DB::table('alt_images')
            ->where('id', $id)
            ->update(['status'=>0]);
      return back();
    }

    public function publishedAltImage($id)
    {
        DB::table('alt_images')
            ->where('id', $id)
            ->update(['status'=>1]);
        return back();
    }



}
