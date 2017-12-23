@extends('layouts.home')

@section('title')
<title>珠宝之家-商品详情</title>
@show
@section('content')
<style>
	.tupian{
		height: 400px;
	}
	.ten{
		margin-top: 50px;
	}
</style>
<div class="container">
	<div class="single">
<div class="container">
	<div class="single-page">					 
		<div class="flexslider details-lft-inf">
			<div class="col-md-12 tupian">
				<img src="{{$goods_pic}}" alt="" width="332" height='332'>
			</div>
		</div>
	</div>
			<!-- FlexSlider -->
			<!--   <script defer="" src="/qiantai/js/jquery.flexslider.js"></script>
			<link rel="stylesheet" href="/qiantai/css/flexslider.css" type="text/css" media="screen">

				<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
			  $('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			  });
			});
			</script> -->
		<div class="details-left-info">
			<h3>欢迎来到商品详情</h3>
				<h4></h4>
			<div class="simpleCart_shelfItem">
				<p>
					<span class="item_price qwe" style="font-size: 16px;cursor: pointer;">${{$goods->price}}</span>
					<span style="font-size: 16px;cursor: pointer;">{{$goods->title}}
					</span>
				</p>
				<form action="/cart" method="post">
					<p class="qty">数量::</p>
					<input min="1" max='10' type="number" id="quantity" name="num" value="1" class="form-control input-small" style="cursor: pointer;">
					<input type="hidden" name="goods_id" value="{{$goods->id}}">
					<hr>
					<div class="single-but item_add">
						<input type="submit" value="添加到购物车">
					</div>
					{{csrf_field()}}
				</form>
			</div>
			<hr>
			<h3>商品简介:</h3>
			<p class="desc">{!!$goods->content!!}</p>
		</div>
		<div class="clearfix"></div>				 	
	</div>
	<div class="ten"></div>
<!-- related products -->
	<div class="related-products">
		<h3>相关产品</h3>
		@foreach($relate as $k=>$v)
		<div class="col-md-4 related products-grid">
			<img src="{{$v->pic}}" alt=" " class="img-responsive" width="300" height="400">
			<div class="simpleCart_shelfItem rel">
				<p>
					<span class="item_price val">¥{{$v->price}}</span>
				</p>
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>
<!-- //related products -->
</div>
</div>
</div>
@stop