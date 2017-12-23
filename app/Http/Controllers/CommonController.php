<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    //
    public function message(Request $request)
    {
    	//手机号
    	$phone = $request->input('phone');
    	//标题
    	$web = 'random';
    	//手机的验证码
    	$code = rand(100000,999999);

    	//将验证码存储起来
    	session(['vcode'=>$code]);

        echo $code;
    }
}
