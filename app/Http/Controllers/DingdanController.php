<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yansongda\Pay\Pay;

class DingdanController extends Controller
{
    protected $config = [
        'alipay' => [
            'app_id' => '2016083101829857',
            'notify_url' => 'http://project.cn/notify',
            'return_url' => 'http://project.cn/return',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAol1j9NE3PtvQYEhGU180X1u3M5mLANDDdOz0uJQx/X+gSduvp23Abcl6EKtQy8NKEmaDukarcTQJGe/OF1zWlyBPsgJmpVwUaBUXFd9hB7hcS51zp/Ux4BA951CLnSsw74aIQLizhXPgyo0Y0xVLqGguMLqrz+77gu0bE4R3zi4sJmoNCYJ4RgUj1ld6965CFbWrNdHJvhklTh0VM0e1T/M12h+xl05PjKn3HX8xEXXmBSI4DctvfcjxV/XwUrn5H7zuQa4cukrCzKCctP2laJgM87Ls285DsshoLZOCE9HpT1/pghU8UScvqbwtvI9xBnYR72adabSZMtvl62OtWwIDAQAB',
            'private_key' => 'MIIEowIBAAKCAQEAol1j9NE3PtvQYEhGU180X1u3M5mLANDDdOz0uJQx/X+gSduvp23Abcl6EKtQy8NKEmaDukarcTQJGe/OF1zWlyBPsgJmpVwUaBUXFd9hB7hcS51zp/Ux4BA951CLnSsw74aIQLizhXPgyo0Y0xVLqGguMLqrz+77gu0bE4R3zi4sJmoNCYJ4RgUj1ld6965CFbWrNdHJvhklTh0VM0e1T/M12h+xl05PjKn3HX8xEXXmBSI4DctvfcjxV/XwUrn5H7zuQa4cukrCzKCctP2laJgM87Ls285DsshoLZOCE9HpT1/pghU8UScvqbwtvI9xBnYR72adabSZMtvl62OtWwIDAQABAoIBAF4WEis25XWmeTyiBSag3792bVYYXqVtVCY4faNMNR+5yk+iX0p9XeoAu5xXOe2p0A2TnDfgZc6mobOG8/0zziIrFiOIIqUmE6kwt3z0Qczwd4NVzUSB4JH/t2+IjC7abXQPmHswzM7DlHqrgrwm9f2zyThxo8hNqy92aJ9JvwcZbC/xiYJJh4DYiNhl8CwUCwTrvSKd4e+ZAcaeDgSpoleM8b1Jy2ewr3G1lwRgQlBAMO8wXbI0uTGgYg6rP+arwsIkh0grrV4e0pbCEtKEKR9H4MtuN2IZgwMsBq2QdPSUN6tOo5LB555Iw+xNpw5+YI88yXEfRM4pdJ1rsnb2CIECgYEAzSSxJoHb/OyJY3+y8Xpnappan/VX2SJvkQA+SGh8+m3+BvRITM5f33OycHUrcPPLY+nV9C14vzazUfnfSZU4oUSHB9nPLynMrTb13b1QtRYGNTXZu0VHs78cGFRmy9q15wLfg0dx2/1Gj/69zcIG20ci0fQNgids89utND8+2ZsCgYEAyp3IgLBwe1Hu7cXQwqpuxjf2JvYd+fs/w7jsjczWNbN0+cOpS2pgOUcWivcXzH0gqW/2PP8lezQ7owAjX9VBe8k7BumZomlHf4++dZF/K5shBPiaKtaUHhfTC9eJI8vpe+2x9ZsVhkcbh/5NAxgwz6ClGbGqPZ8If5ecKtl8l0ECgYBinRDLggFORCaHPgu3KTAtfqWx3y6ronIfMg6+n/v0JovGrAdVZJ+Ruvw8Mxb+5TMQhIflKTayNIlfDs7XgHQIkfiXPYzrDxzk51apkSgK5Nt3GLvh2hvtvCC1UV1ZAXoP4sGvSdjh947ECaEUGAFTx45lfvw/ZNRrJV7NjtmXoQKBgQCC2BXtFQPuf2C+Z+qCa7GRi/4H9xQwpNHuwPLyN391umgmCva+3vk4w/GI2DykL4HyKX1ospQv1fFVN/egIYViPPdDZYNzYG1tsRQbtFPdgxZ1sV1NoLiSHmyJzyye00X6Y+tyYi4qQq1CyzRMdUjALEuyJgt8M8E3NF8DROOygQKBgB/q2Hp32rUPsVVEfMQEF0KCOworBuefeyBYizz4ceKfqpbY74FQQTPm+TTdvHB9XemvcH12giN6ZYgmCJcQYFqjC8MWo9endKRH6ggzCQt6vOocJUzlLC+QHC0owgU5GWCN95mGEkmemYMWi8NtPDeGiVPmcljYOtKv8ByE8hbq',
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('home.dingdan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //插入订单表
        // dd($request->all());
        $data['address_id'] = $request->address_id;
        //
        $data['user_id'] = session('id');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 2;
        $data['bm'] = time().rand(100000,999999);
        //插入主表
        // dd($data);
        $id = DB::table('dingdans')->insertGetId($data);
        // dd($id);
        //插入订单的商品表
        $goods = [];
        foreach($request->data as $k=>$v) {
            $tmp = [
                'dingdan_id' => $id,
                'goods_id' => $v['id'],
                'goods_num' => $v['num']
            ];
            $goods[] = $tmp;
        }
        if(DB::table('dingdan_goods')->insert($goods)) {
            //跳转结算
            return redirect('/dingdan/pay?did='.$data['bm']);
        }else{
            return back()->with('msg','订单创建失败!!');
        }
    }

    public function confirm(Request $request)
    {
        //显示订单的确认页面
        //读取用户的收货地址
        $addresses = DB::table('addresses')->where('user_id', session('id'))->get();
        
        foreach ($addresses as $key => &$value) {
            $value->pname = DB::table('areas')->where('id',$value->province)->value('area_name');
            $value->cname = DB::table('areas')->where('id',$value->city)->value('area_name');
            $value->xname = DB::table('areas')->where('id',$value->xian)->value('area_name');
        }

        //遍历数组
        $data = $request->data;
        // dd($data);
        $goodsData = [];
        //总价
        $total = 0;
        foreach($data as $key => $value) {
            if(isset($value['id'])) {
                //读取商品的详细信息
                $goods = DB::table('goods')->where('id',$value['id'])->first();
                // dd($goods);
                //读取商品的图片信息
                $goods->pic = DB::table('goods_pic')->where('goods_id', $value['id'])->value('pic');
                $goods->num = $value['num'];
                $goodsData[] = $goods;
                $total += $goods->num * $goods->price;
            }
        }

        //解析模板 分配数据
        return view('home.dingdan.confirm', compact('addresses','goodsData','total'));
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
    public function pay(Request $request)
    {
        $did=$request->did;
        $dingdan=DB::table('dingdans')->where('bm',$did)->first();
        $goods=DB::table('dingdan_goods')->where('dingdan_id', $dingdan->id)->get();
        $total=0;
        foreach ($goods as $key => $value) {
            $price=DB::table('goods')->where('id', $value->goods_id)->value('price');
            $total+=$price*$value->goods_num;
        }
        $pay = new Pay($this->config);
        return $pay->driver('alipay')->gateway()->pay($config_biz);
    }
}

