<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addManufacturer()
    {
        $add_manufacturer = view('admin.manufacturer.add-manufacturer');
        return view('admin.admin_master')
                ->with('mainContent', $add_manufacturer);
    }

    public function saveManufacturer(Request $request)
    {
       $this->validate($request, [
          'manufacturerName' => 'required',
          'manufacturerDescription' => 'required',
         ]); 
       $data = array();
       $data['manufacturer_name'] = $request->manufacturerName;
       $data['manufacturer_description'] = $request->manufacturerDescription;
       $data['publicationStatus'] = $request->publicationStatus;

       DB::table('manufacturer')
           ->insert($data);

       Session::put('message','New Manufacturer Added Successfully'); 
       return redirect::to('/add-manufacturer');    
    }

    public function manageManufacturer()
    {
        $manage_manufacturer_info= DB::table('manufacturer')
                                 ->paginate(10);

        $manage_manufacturer = view('admin.manufacturer.manage-manufacturer')
                                ->with('manage_manufacturer_info', $manage_manufacturer_info);

        return view('admin.admin_master')
                ->with('mainContent', $manage_manufacturer);
    }

    public function unpublishedManufacturer($manufacturer_id)
    {
        DB::table('manufacturer')
            ->where('manufacturer_id', $manufacturer_id)
            ->update(['publicationStatus' => 0]);
        return redirect::to('/manage-manufacturer');     
    }

    public function publishedManufacturer($manufacturer_id)
    {
      DB::table('manufacturer')
            ->where('manufacturer_id', $manufacturer_id)  
            ->update(['publicationStatus' => 1]);
     return redirect::to('/manage-manufacturer');      
    }

    public function deleteManufacturer($manufacturer_id)
    {
        DB::table('manufacturer')
            ->where('manufacturer_id', $manufacturer_id)
            ->delete();
     return redirect::to('/manage-manufacturer');      

    }

    public function editManufacturer($manufacturer_id)
    {
        $edit_manufacturer_info=DB::table('manufacturer')
                                ->where('manufacturer_id', $manufacturer_id)
                                ->first();

        $edit_manufacturer = view('admin.manufacturer.edit-manufacturer')
                            ->with('edit_manufacturer_info', $edit_manufacturer_info);
        return view('admin.admin_master')
                ->with('mainContent', $edit_manufacturer);
    }

    public function updateManufacturer(Request $request)
    {
     $this->validate($request, [
      'manufacturerName' => 'required',
      'manufacturerDescription' => 'required',
     ]); 
       $data = array();
       $data['manufacturer_name'] = $request->manufacturerName;
       $data['manufacturer_description'] = $request->manufacturerDescription;
       $data['publicationStatus'] = $request->publicationStatus;
       $manufacturer_id = $request->manufacturerId;
      
       DB::table('manufacturer')
           ->where('manufacturer_id', $manufacturer_id)
           ->update($data);

       Session::put('message','Manufacturer Updated Successfully'); 
       return redirect::to('/manage-manufacturer');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
