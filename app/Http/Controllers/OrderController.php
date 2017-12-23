<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $num=$request->input('num','10');
        $keywords=$request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $dingdan = DB::table('dingdans')
                ->where('user_id','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $dingdan = DB::table('dingdans')->paginate($num);
        }
        return view('admin.order.index',compact('dingdan','num','keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $order=DB::table('dingdans')->where('id',$id)->first();
        return view('admin.order.fahuo',['order'=>$order]);
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
        $data=$request->only('status');
        // dd($data);
        if(DB::table('dingdans')->where('id',$id)->update($data)){
            return redirect('/order')->with('msg','发货成功');
        }else{
            return back()->with('msg','发货失败');
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
        if(DB::table('dingdans')->where('id',$id)->delete()){
            return redirect('/order')->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }

    public function list(){

        $dingdan=DB::table('dingdans')->where('user_id',session('id'))->where('status','2')->join('dingdan_goods','dingdan_id','=','dingdans.id')->get();
        // dd($dingdan1);
        $dingdan1=[];
        $total=0;
        foreach($dingdan as $k=>$v){
            $dingdans=DB::table('goods')->where('id',$v->goods_id)->first();
            $price=DB::table('goods')->where('id',$v->goods_id)->value('price');
            // dd($dingdans);
            $total+=$price*$v->goods_num;
            $title=DB::table('goods')->where('id',$v->goods_id)->value('title');
            $dingdans->bm=$v->bm;
            $dingdans->total=$total;
            $dingdans->goods_num=$v->goods_num;
            $dingdan1[]=$dingdans;
            // dd($dingdan1);
        }


        $dingdan3=DB::table('dingdans')->where('user_id',session('id'))->where('status','3')->join('dingdan_goods','dingdan_id','=','dingdans.id')->get();
        // dd($dingdan1);
        $dingdan2=[];
        $total=0;
        foreach($dingdan3 as $k=>$v){
            $dingdans1=DB::table('goods')->where('id',$v->goods_id)->first();
            $price=DB::table('goods')->where('id',$v->goods_id)->value('price');
            // dd($dingdans);
            $total+=$price*$v->goods_num;
            $title=DB::table('goods')->where('id',$v->goods_id)->value('title');
            $dingdans1->bm=$v->bm;
            $dingdans1->total=$total;
            $dingdans1->goods_num=$v->goods_num;
            $dingdan2[]=$dingdans1;
            // dd($dingdan1);
        }
        // dd($dingdan2);
        $order4=DB::table('dingdans')->where('user_id',session('id'))->where('status','4')->get();
        // dd($order);
        return view('home.order.list',compact('dingdan1','dingdan2','order4'));
    }
}
