<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RelateController extends Controller
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
            $necklace = DB::table('relate')
                ->where('price','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $relate = DB::table('relate')->paginate($num);
        }
        //解析模板
        return view('admin.relate.index',['relate'=>$relate,'num'=>$num,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.relate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['price']);
        //文件上传
        if($request->hasFile('pic')){
            //获取后缀
            $suffix=$request->file('pic')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./upload-relate/'.date('Y-m-d');
            //移动文件
            $request->file('pic')->move($dir,$name);
            //获取文件夹路径
            $data['pic']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('relate')->insert($data)){
            return redirect('/relate')->with('msg','添加成功');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
