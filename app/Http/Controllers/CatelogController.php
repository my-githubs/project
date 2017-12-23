<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CatelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {   
        $num = $request->input('num','10');
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $catelog = DB::table('catelog')
                ->where('id','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $catelog = DB::table('catelog')->paginate($num);
        }
        //解析模板
        return view('admin.catelog.index',['num'=>$num,'keywords'=>$keywords,'catelog'=>$catelog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catelog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //文件上传
        if($request->hasFile('profile')){
            //获取后缀
            $suffix=$request->file('profile')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./catelog'.date('Y-m-d');
            //移动文件
            $request->file('profile')->move($dir,$name);
            //获取文件夹路径
            $data['profile']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('catelog')->insert($data)){
            return redirect('/catelog')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $catelog=DB::table('catelog')->where('id',$id)->first();
        return view('admin.catelog.edit',['catelog'=>$catelog]);
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
        //
          if($request->hasFile('profile')){
            //获取后缀
            $suffix=$request->file('profile')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./catelog'.date('Y-m-d');
            //移动文件
            $request->file('profile')->move($dir,$name);
            //获取文件夹路径
            $data['profile']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('catelog')->update($data)){
            return redirect('/catelog')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table('catelog')->where('id',$id)->delete()){
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }
}
