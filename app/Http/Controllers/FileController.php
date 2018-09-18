<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
    	return view('upload');
    }

    public function storeFile(Request $request)
    {

    	if ($request->hasFile('file')) {

    		$filename = $request->file->getClientOriginalName();

    		$filesize = $request->file->getClientSize();

    		$request->file->storeAs('public/upload',$filename);

    		$file = new File;


    		$file->name = $filename;

    		$file->size = $filesize;

    		$file->save();

    		return 'yes';
    	}
    	//return $request->all();
    }
}
