@extends('layouts.home')

@section('title')
<title>珠宝之家-确认订单</title>
@stop

@section('content')
    <style type="text/css">
    
    .goods-item{
      border:solid 1px blue;
    }
    .actives{
      border:solid 1px #fe1231;
    }
    .dianji{
      border:1px solid green;
    }
    .top{
      height: 50px;
    }
    </style>
    <section class="page-title page-title-4 bg-secondary">
    <div class="container ">
        <div class="row">
        <div class="top"></div>
        <form action="/dingdan" method="post">
        <h2 class="pull-left">收货地址选择</h2>
        <a href="/address" class="btn btn-info pull-right">添加收货地址</a>
        <div class="clearfix"></div>
        <hr>
        @foreach($addresses as $k=>$v)
        <div class="col-md-3">
          <div class="goods-item text-center" aid="{{$v->id}}" style="cursor: pointer;width:290;height: 107px;">
            <h4>{{$v->name}}</h4>
            <p>{{$v->phone}}</p>
            <p>{{$v->pname}}{{$v->cname}}{{$v->xname}}{{$v->detail}}</p>
          </div>
        </div>
        @endforeach
        <input type="hidden" name="address_id">
        <div class="clearfix"></div>
        <h2>商品信息</h2>
        <div class="row">
              <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                  <table class="table cart mb48">
                      <thead>
                        <tr>
                          <th>图片</th>
                          <th>标题</th>
                          <th>数量</th>
                          <th>价格</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($goodsData as $k=>$v)
                          <tr>
                              <td>
                                <a href="#">
                                  <img src="{{$v->pic}}" class="product-thumb" width="50">
                                </a>
                              </td>
                              <td>
                                  <span>{{$v->title}}</span>
                              </td>
                              <td>
                              <input type="hidden" name="data[{{$v->id}}][id]" value='{{$v->id}}'>
                              <input type="text" style="width:20%"  name="data[{{$v->id}}][num]" value="{{$v->num}}">
                              </td>
                              <td>
                                  <span>{{$v->price}}</span>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                      
                  </div>
                  <div class="clearfix"></div>
                  <!--end of items-->
                  <div class="col-md-3 col-md-offset-0 col-sm-10 pull-right">
                      <div class="mb24">
                        <p class="text-right" style="font-size:30px;font-weight:bold;color:#f11232;margin-bottom: 10px;">总价: {{$total}}
                        </p>
                        {{csrf_field()}}
                        <input type="submit" value="创建订单" class="btn btn-primary pull-right">
                      </div>
                  </div>
                  <!--end of totals-->
              </div>
            </form>
        </div>
    </div>  
    <!--end of container-->
</section>
@stop

@section('js')
<script>
  $(function(){
    $('.goods-item').hover(function(){
      $(this).addClass('actives');
    },function(){
      $(this).removeClass('actives');
    }).click(function(){
      // $(this).removeClass('dianji');
      $(this).addClass('dianji');
      //获取当前id
      aid = $(this).attr('aid')

      //将id设置到隐藏域上
      $('input[name=address_id]').val(aid);
    })
  });
</script>
@stop