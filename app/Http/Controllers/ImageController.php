<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware(array('auth:web'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.imageUpload');
    }

    public function upload(Request $request)
    {
        $this->validate($request,[
                    'image'=>'required|image|mimes:paeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension()
        ;

        $request->image->move(public_path('images'),$imageName);

        return back()
                ->with('success','Image Upload Successfully.')
                ->with('path', $imageName);
    }
}
