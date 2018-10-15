<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testcontroller extends Controller
{
   public  $param=array();

        public function __construct(){
            //$this->middleware('auth');
        }

        public function test_model1(){
            $this->param['content']="Model 1 body.";
            return view('test.model',$this->param);	
        }

        public function test_model2(){
            $this->param['content']="Model 2 body.";
            return view('test.model',$this->param);
        }
}
