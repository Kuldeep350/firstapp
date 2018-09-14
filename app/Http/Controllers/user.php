<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display all data
        $users=DB::table('user')->orderBy('id','desc')->get();
        return view("user.index",compact("users"));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //from create
        return view("user.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data insert
        $data=[
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'created_at'=>date('Y-m-d H:i:s')
        ];
        DB::table('user')->insert($data);  
        return redirect('user'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show singl record
        $users=DB::table('user')->where('id','=',$id)->first();
        return view("user.show",compact("users"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //update form
        $users=DB::table('user')->where('id','=',$id)->first();
        return view("user.edit",compact("users"));
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
        //update record
         $data=[
                'name'=> $request->input('name'),
                'email'=> $request->input('email')
                ];
        DB::table('user')->where('id','=',$id)->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        DB::table('user')->where('id','=',$id)->delete();
        return redirect('user');
    }
}
