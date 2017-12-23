<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PinpaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $num = $request->input('num','10');
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $pinpai = DB::table('pinpai')
                ->where('pname','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $pinpai = DB::table('pinpai')->paginate($num);
        }
        //解析模板
        return view('admin.pinpai.index',['pinpai'=>$pinpai,'num'=>$num,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.pinpai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取文件信息
        $data=$request->only(['pname','content','status']);
        //文件上传
        if($request->hasFile('thumb')){
            //获取后缀
            $suffix=$request->file('thumb')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./upload-pinpai/'.date('Y-m-d');
            //移动文件
            $request->file('thumb')->move($dir,$name);
            //获取文件夹路径
            $data['thumb']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('pinpai')->insert($data)){
            return redirect('/pinpai')->with('msg','添加成功');
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
    public function show($pinid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pinid)
    {
        //
        $pinpai = DB::table('pinpai')->where('pinid',$pinid)->first();

        return view('admin.pinpai.edit', ['pinpai'=>$pinpai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pinid)
    {
        //
        //获取文件信息
        // dd($request->all());
        $data=$request->only(['pname','content','status']);
        //文件上传
        if($request->hasFile('thumb')){
            //获取后缀
            $suffix=$request->file('thumb')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./upload-pinpai/'.date('Y-m-d');
            //移动文件
            $request->file('thumb')->move($dir,$name);
            //获取文件夹路径
            $data['thumb']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('pinpai')->where('pinid',$pinid)->update($data)){
            return redirect('/pinpai')->with('msg','添加成功');
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
    public function destroy($pinid)
    {
        //
        if(DB::table('pinpai')->where('pinid',$pinid)->delete()){
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }
    public function plist()
    {
        //读取商品
        //项链
        $xianglian = DB::table('pinpai')
            ->where('status',1)
            ->orderBy('pinid','desc')
            ->paginate(4);

         $xianglian1 = DB::table('pinpai')
            ->where('status',3)
            ->orderBy('pinid','desc')
            ->paginate(4);
            // dd($xianglian1);

        //耳环
            $erhuan = DB::table('pinpai')
            ->where('status',2)
            ->paginate(4);
            // dd($erhuan);

            //戒指
            $jiezhi = DB::table('pinpai')
            ->where('status',4)
            ->paginate(4);

            //图片遍历
             $pinpai = DB::table('pinpai')
            ->orderBy('pinid','desc')
            ->paginate(16);
        //显示模板
        return view('home.pinpai.list',compact('erhuan','xianglian','xianglian1','jiezhi','pinpai'));
    }
}
