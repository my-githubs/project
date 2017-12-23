@extends('layouts.home')

@section('title')
<title>珠宝之家-关于我们</title>
@stop

@section('content')
<style type="text/css">
	img{
		width: 250px;
		height: 250px;
	}
	.item{
		margin-top: 20px;
	}
</style>
<h1 class="text-center">欢迎来到关于我们页面</h1>
<hr>
<div class="container">
	@foreach($about as $k=>$v)
	<div class="row col-md-12 item">
		<div class="col-md-4 col-md-offset-2">
			<img src="{{$v->thumb}}" alt="">
		</div>
		<div class="col-md-4 col-md-offset-2">
			<p>{{$v->name}}</p>
			<div>{{!!$v->content!!}}</div>
		</div>
	</div>	
	@endforeach
</div>
@stop
