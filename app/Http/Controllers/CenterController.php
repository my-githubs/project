<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function center()
    {
    	return view('home.user.center');
    }
}
