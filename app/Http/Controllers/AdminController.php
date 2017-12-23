<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //后台首页
    public function index()
    {	$name=session('uname');
    	$thumb=session('thumb');
        //解析模板
        return view('admin.index', compact('name','thumb'));
    }


}
