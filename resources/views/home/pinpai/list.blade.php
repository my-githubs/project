@extends('layouts.home')

@section('title')
<title>珠宝之家-品牌列表</title>
@show
@section('content')
<style>
	.list{
		width: 242px;
		height: 292px;
		/*background: orange;*/
		margin:5px;
		position: relative;
	}
	.list .tupian{
		margin-top: 35px;
		margin-left: 35px;
	} 
	.list img{
		width: 190px;
		height: 190px;
	}
	.list .gw{
		width: inherit;
		height: 190px;
		background: rgba(0,0,0,0.4);
		position: absolute;
		top: 0px;
		left: 0px;
		z-index: 10;
	}
	.list .yc{
		display: none;
	}
</style>
<div class="cate">
		<div class="container">
			<h1 style="text-align: center; color: #00bd99; font-family: '华文楷体'">品牌展示</h1>
			<div class="top" style="height: 30px;"></div>
			<div class="cate-left">
				<h3>品&nbsp;&nbsp;牌<span>我&nbsp;们&nbsp;的&nbsp;Style</span></h3>
			</div>
			<div class="cate-right">
				<ul id="flexiselDemo1">
					@foreach($xianglian as $k=>$v)
					<li>
						<div class="sliderfig-grid">
							<img src="{{$v->thumb}}" style="cursor: pointer;width: 180px;height: 180px;">
						</div>
					</li>
					@endforeach
					@foreach($xianglian1 as $k=>$v)
					<li>
						<div class="sliderfig-grid">
							<img src="{{$v->thumb}}" style="cursor: pointer;width: 180px;height: 180px;">
						</div>
					</li>
					@endforeach
					@foreach($erhuan as $k=>$v)
					<li>
						<div class="sliderfig-grid">
							<img src="{{$v->thumb}}" style="cursor: pointer;width: 180px;height: 180px;">
						</div>
					</li>
					@endforeach
					@foreach($jiezhi as $k=>$v)
					<li>
						<div class="sliderfig-grid">
							<img src="{{$v->thumb}}" style="cursor: pointer;width: 180px;height: 180px;">
						</div>
					</li>
					@endforeach
					</ul>
					<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,   
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 3
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:4
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
							});
					</script>
					<script type="text/javascript" src="/qiantai/js/jquery.flexisel.js"></script>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="top" style="height: 30px;"></div>
	<div class="container">
		<h1 style="text-align: center; color: #00bd99; font-family: '华文楷体'">产品推荐</h1>
			<div class="top" style="height: 30px;"></div>
	</div>

<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-1"></div>
			<div class="col-md-11 products-grid-left">
				<div class="products-grid-lft">
					@foreach($pinpai as $k=>$v)
					<div class="list pull-left">
						<a href="/pinpai/{{$v->pinid}}" class="tupian">
							<img src="{{$v->thumb}}" alt="">
						</a>
					</div>
					@endforeach					
				</div>
			</div>
		</div>
	</div>
</div>

@stop