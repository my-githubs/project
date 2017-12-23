<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $num=$request->input('num',10);
        $keywords=$request->input('keywords','');
        //关键字检索
        if($request->has('keywords')){
            //列表显示
            $goods=DB::table('goods')
                ->where('title','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            $goods=DB::table('goods')->paginate($num);
        }

        return view('admin.goods.index',compact('num','keywords','goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['title','price','content','kucun']);
        //添加时间
        $data['created_at']=date('Y-m-d H:i:s');
        //添加状态
        $data['status']=1;
        //将数据插入到商品表并获取商品id
        $res=DB::table('goods')->insertGetId($data);
        //如果插入成功
        if($res>0){
            //处理图片
            if($request->hasFile('pic')){
                $images=[];
                //遍历文件上传的数组
                foreach($request->file('pic') as $k=>$v){
                    $tmp=[];
                    //获取后缀
                    $suffix=$v->extension();
                    //创建一个随机名称
                    $name=uniqid('img_').'.'.$suffix;
                    //文件夹路径
                    $dir='./goods-uplaods/'.date('Y-m-d');
                    //移动文件
                    $v->move($dir,$name);
                    //获取文件路径
                    $tmp['pic']=trim($dir.'/'.$name,'.');
                    $tmp['goods_id']=$res;
                    $images[]=$tmp;
                }
                //将图片信息插入到商品图片表中
                DB::table('goods_pic')->insert($images);
                return redirect('/goods')->with('msg','添加成功');
            }else{
                return redirect('/goods')->with('msg','添加失败');
            }
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
        //读取商品的详细信息
        $goods=DB::table('goods')->where('id',$id)->first();
        // dd($goods);
        //读取商品的图片信息
        $goods_pic=DB::table('goods_pic')->where('goods_id',$id)->value('pic');
        // $good_pic=DB::table('goods_pic')->paginate(3);
        
        //相关产品获取
        $relate=DB::table('relate')->get();
        // dd($relate);
        return view('home.goods.show',compact('goods','goods_pic','good_pic','good','relate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods=DB::table('goods')->where('id',$id)->first();
        // dd($goods);
        return view('admin.goods.edit',['goods'=>$goods]);
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
        $data=$request->only(['title','price','content','kucun']);
        //添加时间
        $data['created_at']=date('Y-m-d H:i:s');
        //添加状态
        $data['status']=1;
        // dd($data);
        $images=[];
        //遍历文件上传的数组
        foreach($request->file('pic') as $k=>$v){
            $tmp=[];
            //获取后缀
            $suffix=$v->extension();
            //创建一个随机名称
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./goods-uplaods/'.date('Y-m-d');
            //移动文件
            $v->move($dir,$name);
            //获取文件路径
            $images['pic']=trim($dir.'/'.$name,'.');
        }
        // dd($images);
        $up1=DB::table('goods')->where('id',$id)->update($data);
        $up2=DB::table('goods_pic')->where('id',$id)->update($images);
        if($up1 && $up2){
            return redirect('/goods')->with('msg','添加成功');
        }else{
            return redirect('/goods')->with('msg','添加失败'); 
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
        $det1=DB::table('goods')->where('id',$id)->delete();
        $det2=DB::table('goods_pic')->where('id',$id)->delete();
        if($det1 && $det2){
             return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }

    public function glist()
    {
        //读取商品
        $goods = DB::table('goods')
            ->orderBy('id','desc')
            ->paginate(9);
        //遍历商品信息
        foreach ($goods as $key => &$value) {
            $value->pic = DB::table('goods_pic')->where('goods_id', $value->id)->value('pic');
        }
        //获取分类信息
        $cate=DB::table('cates')->get();
        //显示模板
        return view('home.goods.list',compact('goods','cate') );
    }
}
