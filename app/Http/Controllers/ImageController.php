<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ImageController extends Controller
{
   
    public function index()
    {
    	return view('file');
    }
   
    public function uploadImages()
    {
    	$imgName = request()->file->getClientOriginalName();
        request()->file->move(public_path('storage/images'), $imgName);
    	return response()->json(['uploaded' => '/images/'.$imgName]);
    }
}
