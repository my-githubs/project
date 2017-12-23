<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutController extends Controller
{
   public function out(Request $request){
    	$request->session()->flush();
    	return redirect('/home');
    }
    
}
