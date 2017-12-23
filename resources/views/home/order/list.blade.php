@extends('layouts.home')
@section('title')
<title>珠宝之家-我的订单</title>
@stop
@section('content')
<script>
</script>
	<div class="top"></div>
    <section class="page-title page-title-4 bg-secondary">
    <div class="container ">
        <div class="top"></div>
        <h1 class="text-center"><b>个人中心</b></h1>
        <hr>
        @include('layouts.center-menu')
		<div class="col-md-8 body">
            <h3 style="margin-left: 230px;margin-top:-10px;">我的订单</h3>
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">已支付订单</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已发货订单</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"></a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">已收货订单</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <table class="table table-bordered">
                        <tr>
                            <th>订单编号</th>
                            <th>创建时间</th>
                            <th>订单商品</th>
                            <th>订单数量</th>
                            <th>订单总价</th>
                        </tr>
                        @foreach($dingdan1 as $k=>$v)
                        <tr>
                            <td>{{$v->bm}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->goods_num}}</td>
                            <td>{{$v->total}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <table class="table table-bordered">
                        <tr>
                            <th>订单编号</th>
                            <th>创建时间</th>
                            <th>订单商品</th>
                            <th>订单数量</th>
                            <th>订单总价</th>
                        </tr>
                        @foreach($dingdan2 as $k=>$v)
                        <tr>
                            <td>{{$v->bm}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->goods_num}}</td>
                            <td>{{$v->total}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <table class="table table-bordered">
                        <tr>
                            <th>订单编号</th>
                            <th>创建时间</th>
                        </tr>
                        <tr>
                            @foreach($order4 as $k=>$v)
                            <td>{{$v->bm}}</td>
                            <td>{{$v->created_at}}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@stop