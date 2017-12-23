@extends('layouts.home')
@section('content')
<!--banner start-->
	<link rel="stylesheet" href="/banner/css/shutter.css">
	<script src="/banner/js/jquery.min.js"></script>
	<script src="/banner/js/velocity.js"></script>
	<script src="/banner/js/shutter.js"></script>
	<script>
		$(function () {
			$('.shutter').shutter({
			shutterW: 1140, // 容器宽度
			shutterH: 500, // 容器高度
			isAutoPlay: true, // 是否自动播放
			playInterval: 3000, // 自动播放时间
			curDisplay: 3, // 当前显示页
			fullPage: false // 是否全屏展示
			});
		});
</script>
<!--banner end-->
	<div class="container">
		<div class="shutter">
			<div class="shutter-img">
			 	@foreach($banner as $k=>$v)
				<a href="#" data-shutter-title="{{$v->title}}">
					<img src="{{$v->pic}}" alt="#">
				</a>
				@endforeach
			</div>
			<ul class="shutter-btn">
			  <li class="prev"></li>
			  <li class="next"></li>
			</ul>
			<div class="shutter-desc">
			  <p>Iron Man</p>
			</div>
		</div>
	</div>
	
	<div class="cate">
		<div class="container">
			<div class="cate-left">
				<h3>项链<span>我们的Catelog</span></h3>
			</div>
			<div class="cate-right">
				<ul id="flexiselDemo1">
					@foreach($catelog as $k=>$v)
					<li>
						<div class="sliderfig-grid">
							<img src="{{$v->profile}}" style="cursor: pointer;">
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
<!-- //cate -->
<!-- cate-bottom -->
	<div class="cate-bottom">
		<div class="container" style="width: 100%;">
			<div class="cate-bottom-info">
				<h3>New Collections</h3>
				<p>consequuntur magni dolores eos qui ratione voluptatem doloribus asperiores repellat molestiae non recusandae
					<span>perferendis doloribus asperiores repellat</span>
				</p>
				<div class="buy let">
					<a href="">Read More</a>
				</div>
			</div>
		</div>
	</div>
<!-- //cate-bottom -->
<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="welcome-info">
				<h3>Welcome To Our Store!</h3>
				<p class="non">Repellat molestiae non recusandae<span>Asperiores repellat</span></p>
				<p class="rep">Perferendis doloribus asperiores repellat</p>
				<div class="buy wel">
					<a href="/goods/list">Read More</a>
				</div>
			</div>
		</div>
	</div>
<!-- //welcome -->
<!-- banner-bottom1 -->
	<div class="banner-bottom1">
		<div class="container">
			<div class="banner-bottom1-grids">
				<div class="banner-bot-grd">
					<div class="col-md-7 banner-bot-grid">
						<div class="jel-video">
							<iframe src="https://player.vimeo.com/video/45541146" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-5 banner-bot-grid">	@foreach($necklace1 as $k=>$v)
						<div class="banner-bot-grid1">
							<img src="{{$v->pic}}" width="445" height="295" />
							<div class="pos-absolt">
								<h3>{{$v->title}}</h3>
								<p>{!!$v->content!!}</p>
							</div>
						</div>
						@endforeach
					</div>
					<div class="clearfix"> </div>
				</div>
				@foreach($necklace as $k=>$v)
				<div class="col-md-4 banner-bottom1-grid">
					<div class="banner-bottom1-grid1">
						<a href="/necklace/{{$v->id}}">
							<img src="{{$v->pic}}" alt="" width="350" height="262" />
						</a>
						<div class="head-para">
							<h3>{{$v->title}}}</h3>
							<p>{!!$v->content!!}</p>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //banner-bottom1 -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="product-one">
				@foreach($goods2 as $k=>$v)
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">
							<a href="goods/{{$v->goods_id}}">
								<img src="{{$v->pic}}" alt="" class="img-responsive" style="width: 150px;height: 160px;">
								<div class="mask">
									<span>点击购买</span>
								</div>
							</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">${{$v->price}}}</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"></a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				@endforeach
				@foreach($goods1 as $k=>$v)
				<div class="col-md-2 product-left" style="margin-top: 30px;"> 
					<div class="p-one simpleCart_shelfItem jwe">
							<a href="goods/{{$v->goods_id}}">
								<img src="{{$v->pic}}" alt="" class="img-responsive" style="width: 150px;height: 150px;">
								<div class="mask">
									<span>点击购买</span>
								</div>
							</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">${{$v->price}}}</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"></a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
			<!-- <div class="product-one">
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">							
							<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
							</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">
						<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
						</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">
						<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
						</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">
						<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
						</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">							
							<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
							</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-2 product-left"> 
					<div class="p-one simpleCart_shelfItem jwe">
						<a href="single.html">
								<img src="holder.js/150x150" alt="" class="img-responsive" />
								<div class="mask">
									<span>收藏</span>
								</div>
						</a>
						<div class="product-left-cart">
							<div class="product-left-cart-l">
								<p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
							</div>
							<div class="product-left-cart-r">
								<a href="#"> </a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div> -->
		</div>
	</div>
<!-- //banner-bottom -->
@stop