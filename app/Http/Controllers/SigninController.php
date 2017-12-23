<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function signin()
    {
        return view ('admin.signin');
    }
    public function dosignin(Request $request)
    {
        $data = $request->except(['_token']);

        //检测数据是否正确 根据用户名来查找用户信息
        $user = DB::table('mange')->where('uname', $data['uname'])->first();
        // dd($user);
        //判断 没有这个用户
        if(empty($user)) {
            return back()->with('msg','登陆失败!!');
        }
        // $lib = DB::table('mange')->where('lib', $data['lib'])->first();
        //判断权限
        // if (!$lib) {
           // return back()->with('msg','您没有权限登录,请获取管理员权限');
        // }
        
        //校验密码
        if (Hash::check($data['password'], $user->password)) {
        // 
            session(['thumb'=>$user->thumb]);
            session(['uid'=>$user->uid]);
            session(['uname'=>$user->uname]);

            return redirect('/admin')->with('msg','登陆成功');
            
        }
        return back()->with('msg','登陆失败!!');
    }
}
