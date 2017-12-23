<!DOCTYPE html>
<html>
<head>
@section('title')
<title>珠宝之家</title>
@show
<!-- for-mobile-apps -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/qiantai/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/qiantai/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="/qiantai/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/qiantai/js/move-top.js"></script>
<script type="text/javascript" src="/qiantai/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<link href="/qiantai/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="/qiantai/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="/qiantai/js/menu_jquery.js"></script>
<script src="/qiantai/js/simpleCart.min.js"> </script>
<!-- <link href='http://fonts.useso.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'> -->
<script src="/qiantai/js/holder.min.js"></script>
</head>
<body>
<!-- header -->
<!-- //header -->
<!-- top-header -->
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<li><a href="/personal">个人中心</a></li>|
					<li><a href="/order/list">订单</a></li>
				</ul>
			</div>
			@if(!session('id'))
			<div class="top_left">
				<ul>
					<li class="top_link"><a href="/login">登录</a></li>|
					<li class="top_link"><a href="/signup">注册</a>
					</li>					
				</ul>
			</div>
			<div class="clearfix"></div>
			@else
			<div class="top_left">
				<ul>
					<form action="/out" method="post">
					<li class="top_link"><a href="#">{{session('username')}}</a></li>|
						{{csrf_field()}}
						<li class="top_link"><button class="btn btn-default" style="border:none;background: #f65a5b;color: #fff;margin-left: -5px;margin-top: -3px;">[退出]</button>
						</li>
					</form>
										
				</ul>
			</div>
			@endif
		</div>
	</div>
</div>
<!-- top-header -->
<!-- logo-cart -->
<div class="header_top">
	<div class="container">
		<div class="logo">
		 	<a href="index.html">珠宝之家商店</a>			 
		</div>
		<div class="header_right">
			<div class="cart box_1">
			</div>				 
		</div>
		<div class="clearfix"></div>	
	</div>
</div>
<!-- //logo-cart -->
<!------>
<div class="mega_nav">
	 <div class="container">
		 <div class="menu_sec">
		 <!-- start header menu -->
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="/home">Home</a></li>
			<li class="grid">
				<a class="color1" href="/goods/list">首饰</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Popular Brands</h4>
								<ul>
									<li><a href="products.html">Slave Bracelets</a></li>
									<li><a href="products.html">Rings</a></li>
									<li><a href="products.html">Necklaces</a></li>
									<li><a href="products.html">Chokers</a></li>
									<li><a href="products.html">Cuff Links</a></li>									
									<li><a href="products.html">Bangles</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Style Zone</h4>
								<ul>
									<li><a href="products.html">Men</a></li>
									<li><a href="products.html">Women</a></li>
									<li><a href="products.html">Brands</a></li>
									<li><a href="products.html">Kids</a></li>
									<li><a href="products.html">Accessories</a></li>
									<li><a href="products.html">Style Videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>All Jewellery</h4>
								<ul>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">commodi consequatur</a></li>
									<li><a href="products.html">illum qui dolorem</a></li>
									<li><a href="products.html">nihil molestiae</a></li>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">consequatur eum</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Seating</h4>
								<ul>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">commodi consequatur</a></li>
									<li><a href="products.html">illum qui dolorem</a></li>
									<li><a href="products.html">nihil molestiae</a></li>
									<li><a href="products.html">eum fugiat</a></li>
									<li><a href="products.html">consequatur eum</a></li>
								</ul>	
							</div>						
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    			</div>
			</li>
			<li><a class="color1" href="#">目录</a>
			</li>				
			<li><a class="color1" href="#">拍卖</a>
			</li>
			<li><a class="color1" href="#">独家</a>
			</li>				
			<li><a  class="color1" href="/pinpai/list">品牌</a>
			</li>								
		</ul> 
			<div class="search">
				 <form>
					<input type="text" value="" placeholder="搜索">
					<input type="submit" value="">
				</form>
			</div>
			<div class="clearfix"></div>
		 </div>
	  </div>
</div>
<!--头部 end-->
@section('js')
@show
@section('content')
@show

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 footer-grid">
				<h6>关于我们</h6>
				<p>应力层和笑声。聊天酱，汤或开发商元素，但现在只有悲伤锅，有时免费伤心在逃。本科赌场。制造业消费LOREM</p>
			</div>
			<div class="col-md-3 footer-grid">
				<h6>信息</h6>
				<ul>
					<li><a href="/about/list">关于我们</a></li>
					<li><a href="#">配送信息</a></li>
					<li><a href="#">隐私政策</a></li>
					<li><a href="#">条款 &amp; 条件</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h6>我的账户</h6>
				<ul>
					<li><a href="login.html">我的账户</a></li>
					<li><a href="#">订单历史记录</a></li>
					<li><a href="#">愿望清单</a></li>
					<li><a href="#">通讯</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h6>附加功能:</h6>
				<ul>
					<li><a href="#">品牌</a></li>
					<li><a href="#">Cadeaubonnen</a></li>
					<li><a href="#">关联公司</a></li>
					<li><a href="#">特价</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="footer-copy">
		<p>Copyright &copy; 2017-12-8 团队合作<a href="#" target="_blank" title="珠宝之家">php就业班</a> - <a href="http://www.cssmoban.com/" title="网站项目" target="_blank">网站项目</a></p>
	</div>
<!-- //footer -->
</body>
</html>