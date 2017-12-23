<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){

    	//读取商品的详细信息和图片信息
        $goods=DB::table('goods')->join('goods_pic','goods_id','=','goods.id')->paginate(3);
        $goods1=DB::table('goods')->join('goods_pic','goods_id','=','goods.id')->paginate(6);
        $goods2=DB::table('goods')->join('goods_pic','goods_id','=','goods.id')->orderBy('price','desc')->paginate(6);

        // dd($goods);
        //catelog图获取
        $catelog=DB::table('catelog')->get();
        //banner图获取
        $banner=DB::table('banner')->get();
        // dd($banner);
        //高贵大气项链获取
        $necklace=DB::table('necklace')->paginate(3);
        $necklace1=DB::table('necklace')->orderBy('id','desc')->paginate(1);
        
    	return view('home.index',compact('goods','goods1','catelog','goods2','banner','necklace','necklace1'));
    }
}
