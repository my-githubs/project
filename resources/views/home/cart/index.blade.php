@extends('layouts.home')

@section('title')
<title>珠宝之家-购物车列表</title>
@stop

@section('content')
<style>
    .le{
    	line-height: 50px;
    }
    .hen{
       border-bottom: 1px solid #ededed;
       margin-top: 45px;
    }
    .gwc{
    	color: red;
    	font-size: 30px;
    	line-height: 100px;
    }
    .sou{
    	width: 500px;
    	margin-top: 35px;
    }
    .car{
    	border-bottom: 2px red solid;
    }
	#check{
		width: 30px;
		height: 30px;

	}
	.table tr th{
		text-align: center;
	}
	.table .tp img{
		margin-left: 20px;
	}
</style>
<div class="container">
	<div class="row col-md-12">
		<div class="pull-left le">您好,欢迎来到首饰页面</div>	
		<div class="pull-right">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#">客户服务</a></li>
			  <li role="presentation" class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			      网站导航 <span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu">
			      <li role="presentation" class="active"><a href="#">服务</a></li>
			    </ul>
			  </li>
			  <li role="presentation"><a href="#">收藏网站</a></li>
			  <li role="presentation"><a href="#">帮助中心</a></li>
			</ul>
		</div>	
	</div>
	<div class="hen"></div>
	<div class="row col-md-12">
		<div class="pull-left gwc col-md-2">我的购物车</div>
		<div class="pull-right sou">
		    <div class="input-group">
		      <input type="text" class="form-control col-md-10" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">搜索</button>
		      </span>
		    </div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-12 car">
		我的购物车
	</div>
	<form action="/dingdan/confirm" method="post">
	<div class="col-md-12">		
		<table class="table table-bordered">
			<tr>
				<th width="70"><input type="checkbox" name="">全选</th>
	            <th style="width: 100px;">图片</th>
	            <th>标题</th>
	            <th width="50">数量</th>
	            <th>价格</th>
	            <th>操作</th>
			</tr>
			@foreach($goods as $k=>$v)
			<tr>
	            <td scope="row" class="pull-center">
	                <input type="checkbox" name="data[{{$v->id}}][id]" value="{{$v->goods_id}}" id="check">
	            </td>
	            <td class="tp">
                    <img alt="Product" class="product-thumb" src="{{$v->pic}}" style="text-align: center;width: 50px;">
	            </td>	            
	            <td>
	                <span style="text-align: center;margin-top: 10px;">{{$v->title}}</span>
	            </td>
	            <td>
	            <input type="text" style="width:20px;margin-top: 10px;margin-left: 5px;" name="data[{{$v->id}}][num]" value="{{$v->num}}">
	            </td>
	            <td>
	                <span style="text-align: center;margin-top: 15px;">{{$v->price}}</span>
	            </td>
	            <th scope="row">
	                <button type="button" class="del btn btn-danger" cid="{{$v->id}}" style="margin-top: 10px;">删除</button>
	            </th>
	        </tr>		
			@endforeach
		</table>
		<div class="clearfix"></div>
	    <div class="col-md-8 col-md-offset-2 pull-right">
	        <div class="mb24 pull-right">
	            {{csrf_field()}}
	            <input type="submit" value="创建订单">
	        </div>
	    </div>
	</div>
	</form>
</div>
@stop

@section('js')
<script>
	$(function(){
    $('.del').click(function(){
    	//获取相关信息
    	var cid=$(this).attr('cid');
    	var tr=$(this).parents('tr');
    	//发送请求
    	$.ajax({
    		type:'get',
    		url:'/cart/delete',
    		data:{'cid':cid},
    		success:function(data){
    			if(data == '1') {
                    tr.fadeOut(1000,function(){
                        alert('移出成功!!!');
                    });
                }
    		}
    	})
    })
	})
</script>
@stop