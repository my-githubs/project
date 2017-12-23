@extends('layouts.home')

@section('title')
<title>珠宝之家-商品列表</title>
@show
@section('content')
<style>
	.list{
		width: 242px;
		height: 292px;
		background: #fff;
		margin:5px;
		border-radius: 5px;
		border:1px solid #999;
		position: relative;
		cursor: pointer;
	}
	.list:hover{
		border:1px solid #ff3213;
	}
	.list .tupian{
		margin-top: 30px;
		margin-left: 30px;
	} 
	.list img{
		width: 190px;
		height: 190px;
	}
	.list h4{
		color: #F65A5B;
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
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-8 products-grid-left">
				<div class="products-grid-lft">
					@foreach($goods as $k=>$v)
					<div class="list pull-left">
						<a href="/goods/{{$v->id}}" class="tupian">
							<img src="{{$v->pic}}" alt="" style="padding: 10px;">
						</a>
						<h4 class="text-center">{{$v->title}}</h4>
						<h5 class="text-center">¥{{$v->price}}</h5>
						<div class="gw yc">
							<a href="/goods/{{$v->id}}">{{$v->kucun}}
							</a>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-4 products-grid-right">
				<div class="w_sidebar">
					<div class="w_nav1">
						<h4>All</h4>
						<ul>
							@foreach($cate as $k=>$v)
							<li><a href="women.html">{{$v->name}}</a></li>
							@endforeach
						</ul>	
					</div>
					<section class="sky-form">
						<h4>宝石</h4>
						<div class="row1 scroll-pane jspScrollable" tabindex="0" style="overflow: hidden; padding: 0px; width: 348px;">
						<div class="jspContainer" style="width: 348px; height: 200px;">
							<div class="jspPane" style="padding: 0px; width: 379px; top: 0px;">
								<div class="col col-4">
								@foreach($cate as $k=>$v)
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked="">
									<i></i>{{$v->name}}
								</label>
								@endforeach
							</div>
						</div>
						<div class="jspVerticalBar">
							<div class="jspCap jspCapTop">
								
							</div>
							<div class="jspTrack" style="height: 200px;">
								<div class="jspDrag" style="height: 81px;">
									<div class="jspDragTop">
										
									</div>
									<div class="jspDragBottom"></div>
								</div>
							</div>
							<div class="jspCap jspCapBottom">
							</div>
						</div>
					</div>
				</div>
					</section>
					<section class="sky-form">
						<h4>brand</h4>
						<div class="row1 scroll-pane jspScrollable" tabindex="0" style="overflow: hidden; padding: 0px; width: 348px;">
						<div class="jspContainer" style="width: 348px; height: 200px;">
							<div class="jspPane" style="padding: 0px; width: 379px; top: 0px;"><div class="col col-4">
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked=""><i></i>assumenda est
								</label>
							</div>
						</div>
						<div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><div class="jspTrack" style="height: 200px;"><div class="jspDrag" style="height: 117px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><div class="jspCap jspCapBottom"></div></div></div></div>
					</section>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@stop