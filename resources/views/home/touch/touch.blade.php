@extends('layouts.home')

@section('content')

<style type="text/css">
	li{
		list-style: none;
		text-align: center;
	}
</style>
<div class="top" style="margin-top: 20px;"></div>
<div class="container">
	<div class="col-md-2"></div>
	<div class="col-md-8 text-center">
		<h1 style="color: #00ace9;font-size: 44px; letter-spacing: 6px;">服务,因为用心而温暖</h1>
	</div>
	<div class="col-md-2"></div>
</div>
<div class="top" style="height: 40px;"></div>
<div class="container">
	
<ul class="row">
            <li class="col-md-4">
                <img src="/qiantai/images/1.1.jpg" alt="" width="70" height="70" style="margin-top: 40px;">
                <h2>通过电子邮件 </h2>
                <p>我们将尽快给予您答复。</p>
                <div class="btn-wrapper" style="margin-top: 20px;">
                    <a href="" role="button" ext-modal="true" class="btn btn-primary uaevent" data-eventcategory="contact" data-eventaction="click" data-eventlabel="body" name="button">发送电子邮件</a>
                </div>
            </li>
            <li class="col-md-4">
                <img src="/qiantai/images/2.2.jpg" alt="" style="margin-top: 40px;" width="70" height="70">
                <h2>销售点</h2>
                <p>我们将在销售点恭候您的光临.</p>
                <div class="btn-wrapper" style="margin-top: 20px;">
                    <a href="" role="button" ext-modal="true" class="btn btn-primary uaevent" data-eventcategory="" data-eventaction="click" data-eventlabel="body" name="button">寻找销售店铺</a>
                </div>
            </li>
            <li class="col-md-4">
               	<img src="/qiantai/images/3.3.jpg" style="margin-top: 40px;" width="70" height="70">
                <h2>常见问题解答</h2>
                <p>我们将在线帮您解决你的问题</p>
                <div class="btn-wrapper" style="margin-top: 20px;">
                    <a href="" role="button" ext-modal="true" class="btn btn-primary uaevent" data-eventcategory="faq" data-eventaction="click" data-eventlabel="body" name="button">查看常见问题解答</a>
                </div>
            </li>
            </ul>	
</div>
@stop
