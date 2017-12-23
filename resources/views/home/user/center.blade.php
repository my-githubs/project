@extends('layouts.home')
@section('title')
<title>珠宝之家-个人中心</title>
@stop
@section('content')
<style>
    .top{
        height: 20px;
    }
</style>
	<div class="top"></div>
    <section class="page-title page-title-4 bg-secondary">
    <div class="container ">
        <div class="top"></div>
        <h1 class="text-center">个人中心</h1>
        <hr>
        @include('layouts.center-menu')
		<div class="col-md-9">
			<img src="holder.js/100px500?text=个人中心" alt="">
		</div>
    </div>
</section>
@stop