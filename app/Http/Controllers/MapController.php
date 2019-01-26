<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;



class MapController extends Controller
{
    public function index()
{
    Mapper::map(23.8103, 90.4125);

    return view('frontEnd.contact.contact-us');
}
}
