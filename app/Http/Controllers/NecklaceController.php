<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NecklaceController extends Controller
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
            $necklace = DB::table('necklace')
                ->where('title','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $necklace = DB::table('necklace')->paginate($num);
        }
        //解析模板
        return view('admin.necklace.index',['necklace'=>$necklace,'num'=>$num,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.necklace.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['title','content']);
        //文件上传
        if($request->hasFile('pic')){
            //获取后缀
            $suffix=$request->file('pic')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./upload-necklace/'.date('Y-m-d');
            //移动文件
            $request->file('pic')->move($dir,$name);
            //获取文件夹路径
            $data['pic']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('necklace')->insert($data)){
            return redirect('/necklace')->with('msg','添加成功');
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
        $necklace = DB::table('necklace')->where('id',$id)->first();

        return view('admin.necklace.edit', ['necklace'=>$necklace]);
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
         $data=$request->only(['title','content']);
        //文件上传
        if($request->hasFile('pic')){
            //获取后缀
            $suffix=$request->file('pic')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./upload-necklace/'.date('Y-m-d');
            //移动文件
            $request->file('pic')->move($dir,$name);
            //获取文件夹路径
            $data['pic']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('necklace')->insert($data)){
            return redirect('/necklace')->with('msg','添加成功');
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
        if(DB::table('necklace')->where('id',$id)->delete()){
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }
}
