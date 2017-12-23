<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
     
        $num = $request->input('num', 10);
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $manger = DB::table('mange')
                ->where('uname','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $manger = DB::table('mange')->paginate($num);
        }


        //解析模板
        return view('admin.manger.index', [
            'manger'=>$manger,
            'keywords' => $keywords,
            'num' => $num
            ]);

        //解析模板
        // return view('admin.user.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['uname','password']);
        $data['password'] = Hash::make($data['password']);
        //文件上传
        if($request->hasFile('thumb')) {
            $suffix = $request->file('thumb')->extension();
            $name = uniqid('img_').'.'.$suffix;
            $dir = './upload/'.date('Y-m-d');
            $request->file('thumb')->move($dir, $name);

            $data['thumb'] = trim($dir.'/'.$name,'.');
        }
            

        //将数据插入到数据库中
        if(DB::table('mange')->insert($data)) {
            return redirect('/manger')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $manger = DB::table('mange')->where('uid',$uid)->first();

        return view('admin.manger.edit', ['manger'=>$manger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $data = $request->only(['uname']);
        //图片上传
        //文件上传
        if($request->hasFile('thumb')) {
            //获取文件的后缀名
            $suffix = $request->file('thumb')->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './upload/'.date('Y-m-d');
            //移动文件
            $request->file('thumb')->move($dir, $name);
            //获取文件的路径
            $data['thumb'] = trim($dir.'/'.$name,'.');
    }
       if(DB::table('mange')->where('uid',$uid)->update($data)) {
            return redirect('/manger')->with('msg','更新成功');
        }else{
            return back()->with('msg','更新失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        //
        if(DB::table('mange')->where('uid', $uid)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败!!');
        }
    }
}
