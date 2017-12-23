<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function store(Request $request){
        // dd($request->all());
        $data=$request->only('num','goods_id');
        $data['created_at']=date('Y-m-d H:i:s');
        $data['user_id']=session('id');
        $goods=DB::table('carts')->where('user_id',$data['user_id'])->get();
        // dd($goods);
        
        //根据id来获取商品的详细信
        foreach($goods as $k=>$v){
            $v->detail=DB::table('goods')->where('id',$v->goods_id)->first();
            $v->pic=DB::table('goods_pic')->where('goods_id',$v->goods_id)->value('pic');
            $v->price=DB::table('goods')->where('id',$v->goods_id)->value('price');
            $v->title=DB::table('goods')->where('id',$v->goods_id)->value('title');
        
        }
        // dd($goods);
        // dd($data);
        //将数据插入到购物车表中
        if($res=DB::table('carts')->insert($data)){
            return view('home.gwc.cart');
        }else{
            return back()->with('msg','加入购物车失败');
        }
    }

    public function index(){
        //读取购物车中内容
        $id=session('id');
        $goods=DB::table('carts')->where('user_id',$id)->get();
        
        //根据id来获取商品的详细信
        // dd($goods);/
        foreach($goods as $k=>$v){
            $v->detail=DB::table('goods')->where('id',$v->goods_id)->first();
            $v->pic=DB::table('goods_pic')->where('goods_id',$v->goods_id)->value('pic');
            $v->price=DB::table('goods')->where('id',$v->goods_id)->value('price');
            $v->title=DB::table('goods')->where('id',$v->goods_id)->value('title');
        
        }
        // dd($goods);
        return view('home.cart.index',compact('goods'));
    }

    public function delete(Request $request)
    {
        //获取id
        $id = $request->input('cid');
        // dd($id);
        //删除购物车内容
        if(DB::table('carts')->where('id', $id)->delete()) {
            echo 1;
        }else{
            echo 0;
        }
        
    }
}
