<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PersonalController extends Controller
{
    public function index(){
        return view('home.user.personal');
    }

    public function store(Request $request){
        // dd($request->all());
        $data=$request->except('_token');
        // dd($data);
        if(DB::table('personal')->insert($data)){
            return redirect('/center')->with('msg','信息添加成功');
        }else{
            return back()->with('msg','信息添加失败');
        }
    }

    public function houtai(Request $request){
        $num = $request->input('num','10');
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $personal = DB::table('personal')
                ->where('name','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $personal = DB::table('personal')->paginate($num);
        }
        // dd($personal);
        return view('admin.personal.houtai',compact('personal','num','keywords'));
    }
}
