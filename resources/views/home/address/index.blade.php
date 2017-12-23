@extends('layouts.home')
@section('title')
<title>珠宝之家-收货地址</title>
@stop
@section('content')
<style>
  .top{
    height: 30px;
  }
  .cs{
    font-weight: normal;
  }
</style>
    <div class="top"></div>
    <section class="page-title page-title-4 bg-secondary">
    <div class="container ">
        <div class="top"></div>
        <div class="list-group col-md-3 row pull-left">
              <a href="/personal" class="list-group-item ">
                个人信息编辑
              </a>
              <a href="/touch" class="list-group-item">联系客服</a>
              <a href="#" class="list-group-item">个人收藏</a>
              <a href="/order/list" class="list-group-item">我的订单</a>
              <a href="#" class="list-group-item active">收货地址</a>
        </div>
        <div class="col-md-9 pull-right">
            <h2 class="text-left pull-left">收货地址</h2>
            <!-- <div class="hen"></div>
              <h5>收货地址列表</h6>
            <hr> -->
            <div class="clearfix"></div>
            <hr>
            <div class="col-md-6 col-md-offset-3">
                <form action="/address" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="cs">姓名</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="cs">手机号</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="cs">收货地址</label>
                    <div class="clearfix"></div>
                    <div class='col-md-4'>
                        <select name="province" id="" class="form-control ">
                            <option value="">请选择</option>
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <select name="city" id="" class="form-control ">
                            <option value="">请选择</option>
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <select name="xian" id="" class="form-control ">
                            <option value="">请选择</option>
                        </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group" style="margin-top:10px;">
                    <label for="exampleInputEmail1" class="cs">详细地址</label>
                    <textarea type="checkbox" value="1" name="detail" class="form-control" id="exampleInputEmail1"></textarea>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="1" name="is_default"> 是否为默认收货地址
                    </label>
                  </div>
                    {{csrf_field()}}
                  <button type="submit" class="btn btn-info">添加地址</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop              
@section('js')
<script>
$(function(){
  // $('.list-group-item').click(function(){
  //     $(this).addClass('active').siblings('.list-group-item').removeClass('active');
  //   })
  //   $('.list-group-item').hover(function(){
  //     $(this).addClass('active');
  //   },function(){
  //     $(this).removeClass('active');
  //   })

 function init() {
    //
    $.ajax({
        type:'get',
        url: '/getarea',
        dataType:'json',
        data: {pid:0},
        success: function(data){
            for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=province]').append(option);
            }
        }
    })
}
init();

$('select[name=province]').change(function(){
    $('select[name=city]').html('<option value="">请选择</option>')
    //获取当前省的id
    var id = $(this).val();
    //发送ajax获取当前省所对应的市的信息
    $.ajax({
        type:'get',
        url: '/getarea',
        dataType:'json',
        data: {pid:id},
        success: function(data){
            for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=city]').append(option);
            }
        }
    })
});

$('select[name=city]').change(function(){
    $('select[name=xian]').html('<option value="">请选择</option>')
    //获取当前省的id
    var id = $(this).val();
    //发送ajax获取当前省所对应的市的信息
    $.ajax({
        type:'get',
        url: '/getarea',
        dataType:'json',
        data: {pid:id},
        success: function(data){
            for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=xian]').append(option);
            }
        }
    })
});
})
</script>
@endsection