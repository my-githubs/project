<?php

namespace App\Http\Controllers;

use Yansongda\Pay\Pay;
use Illuminate\Http\Request;
use DB;
class PayController extends Controller
{
    //
    protected $config = [
        'alipay' => [
            'app_id' => '2016083101829857',
            'notify_url' => 'http://pro.com/notify',
            'return_url' => 'http://pro.com/return',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkjHkm7K67KSRm0NuF3mHzfCuI9ObwFVR/CSOhuKaT5DhDOvb1c4rsO7rRgPFD/Zgl5KOUTlV+1yPK/HvMfw0LQIoCbXXIv5ubRhQB1b3NCM6nN0EyyeAekaa6Y9aMOtD42/B50RJC6mQH2bnCHuoIgPGYZlsvQAa1ZEDwO87iV7ptXiSGVcJpQi1Gx2rkuh02oPzpRSH1yS/iyrvd80YpjrxqmWDRC8nWdRTZepw2AO6LxoSX2sIji+t7sXuThT37AJnmZcFATQwujhRzhfvJHFYxPKB2wLOzXtlyYq03ukbbsQI6BR4HKVelFgsxo4G6hGjzy8E+AOeoXeeQGY6qQIDAQAB',
            'private_key' => 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCSMeSbsrrspJGbQ24XeYfN8K4j05vAVVH8JI6G4ppPkOEM69vVziuw7utGA8UP9mCXko5ROVX7XI8r8e8x/DQtAigJtdci/m5tGFAHVvc0Izqc3QTLJ4B6Rprpj1ow60Pjb8HnREkLqZAfZucIe6giA8ZhmWy9ABrVkQPA7zuJXum1eJIZVwmlCLUbHauS6HTag/OlFIfXJL+LKu93zRimOvGqZYNELydZ1FNl6nDYA7ovGhJfawiOL63uxe5OFPfsAmeZlwUBNDC6OFHOF+8kcVjE8oHbAs7Ne2XJirTe6RtuxAjoFHgcpV6UWCzGjgbqEaPPLwT4A56hd55AZjqpAgMBAAECggEAMVrQr9OmEW/5jC42g4xO0bK4R3YP9d2YAQSibV0g9U2W/JK/s62XyHLQUOHC7IGj2GfszfUKVwLHfvF9bCWVw8Afni+agsDcrM3xbpjoedyO1Bg1nxQl5qHheIohy7QRRj4beyTteBd1hXRq+M0uVNVratWuBRx88q6zUrYxJk22/QKlLZ77vadvQeRz3bFnpNPUrWiYhzxn03i5nhOF8N3FkybWstVfRDa/d5QueHybmP9y18IDKYTterdxYey3MAWS2+cVCmMcUzrjerwNwvB7RhMgYX5AVeNTz1EmptrC8sY3ph/qYirUITSPqXMpECfnk9huSuUz8eBPFthFUQKBgQDDul4ISL5umCf8wQjhVhdDlJ5SOAxf7dTN9S5SWxg/0VwuuAkkUZwGlBsbsU0BQj+KTIRVnCcq3ccHFLBvh5wfw1wh3NSIvcsEvSo+fAi0Ucbmqhx0R4mhjPvDkRio0yVLUuBwROF8MNdoDRswfNDEJX5MLRRWjPU6c2DtPBn8zQKBgQC/Nrs3phVyz9c7tZi7ioujN8OGrvVF/EEQKyAuR4oMDNcwcL3vpFhNRCTZ6Qix6WLmeVxz+y0PqwQOilQdQPsMGjNXwkSb+RRT6i5Km/1V+q+Otmj7q00v70nMj78MxlwJzjC+hv65qrG3NqQO4cSLW7kTw0nmQRV2e90JFDn1TQKBgQCjKC0QjMsp1+6ldKiZZrGX5UCg2xX9tX0KftKxVjx9nmFQlJsSSnFczoNWb1L4tKfQ+n3p+3Ru+FbboTR+lDXiCHE5zSLiJgwhlCqt0alT30OFrtJvX97r62FHoiFDQle5VYnALLsmUnSNyTccET/Z8kM47u8gQvp9Uga/W7VyFQKBgQC1swiMhOH0y9O3BYUxESJH4wGFxlOEQYSCHLjjwU9IzBrgCQIz6nOOWKa7+1kr1p8Ia2KTQ6c6MEQWnRP5CHqGsY8AYbZYkIPkia+bbkd5oFGax3NTUyBx4Gy8Wgwt04A6QRjIs/bx72YYt2+GRLtDwdFJGlXq2wXOJT2RFwtMMQKBgBJwW3QiPpoLPp3itGiVYXOtby84/aw0a8tvqOHaAueK6H3tf2LkXT+k/iq2xq3QOLLX/NTmb2oE69SNNQ6qliZlSHZg1PGFY8K0TKbUeWpXf4MHzM3kTSB4C2GA9siRAHPoTY3qT85641jhMe1LU1qd7tv3w8FFaG2ndmCI/qJp',
        ],
    ];

    public function index(Request $request)
    {   
        $bm=$request->all();
        // dd($bm['did']);
        $goods=DB::table('dingdans')->where('bm',$bm)
            ->join('dingdan_goods','dingdan_id','=','dingdans.id')
            ->get();
        // dd($goods);
        $total=0;
        foreach($goods as $k=>$v){
            $id=$v->goods_id;
            $num=$v->goods_num;
            // dd($num);
            // dd($id);
            $price=DB::table('goods')->where('id',$id)->value('price');
            // dd($price);
            $total+=$price*$num;
        }
        // dd($total);


        $config_biz = [
            'out_trade_no' => $bm['did'],
            'total_amount' => $total,
            'subject'      => '珠宝之家',
        ];
        $pay = new Pay($this->config);
        return $pay->driver('alipay')->gateway()->pay($config_biz);
    }
    /**
    /pay_return?total_amount=0.01&timestamp=2017-12-05+15%3A13%3A29&sign=YFG54QssRYe%2BBQcyRy7dXMtyqS4HGTUnWVYWV8uKKfc4cCPO%2FSD0bC9KeTchyzvFa0D%2FbKPvsGtD5lRQ5grT2xbDUtAqJOeWsfuspnBF3DYD5JTso5ydBFxR6GM4g7D2i1AquTga2uvc6wsSuMmrZxSgjJ0MybksTu%2BACIMirW4AYxHNexFpYeDP1b7DKVw5WnZSfRYfFguGZjVct74ZHQCy84yChlRJBrMlQLZklQw%2BLXJAbzVU%2FydFb%2BwDp%2FizE7onBb8kJAwO%2BjDHRtXw5qeb%2FXeyIsrOKF%2FFs1yZC5Sui8ih48C5R0PE3nFHdMgRTATSvNo8hfKmLoesuMFECg%3D%3D&trade_no=2017120521001004580536145716&sign_type=RSA2&auth_app_id=2016083101829857&charset=utf-8&seller_id=2088221571819819&method=alipay.trade.page.pay.return&app_id=2016083101829857&out_trade_no=123456789&version=1.0
    */    

    public function return_url(Request $request)
    {
        $pay = new Pay($this->config);

        return $pay->driver('alipay')->gateway()->verify($request->all());
    }


    public function tuikuan()
    {
        $pay = new Pay($this->config);

        return $pay->driver('alipay')->gateway()->refund('123456789',0.01);
    }


}
