@extends('layouts.home')

@section('content')
<style>
	.top{
		height: 30px;
	}
</style>
<div class="container">
		<div class="top"></div>
		<div class="top"></div>
		<div class="col-sm-4"></div>
		<div class="col-sm-4  center-block text-center"><h1>Register Now</h1></div>
		<div class="clearfix"></div>
		<div class="top"></div>
 		<div class="col-sm-4">
 			<p>欢迎, 请按照以下步骤完成注册.</p>
			<p>如果你以前注册过我们, <a href="/login">请点击这里</a></p>
 		</div>
 		<div class="clearfix"></div>
		<div class="top"></div>
		<form class="form-horizontal" action="/signup" method="post">
	  		<div class="form-group">
	    		<label for="inputEmail3" class="col-sm-2 control-label" id="a1">用户名</label>
	    		<div class="col-sm-7">
	      			<input type="text" class="form-control" id="inputEmail3" placeholder="name" name="username">
	      			<span></span>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="inputPassword3" class="col-sm-2 control-label" id="a1">密码</label>
	    		<div class="col-sm-7">
	      			<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
	      			<span></span>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="inputPassword3" class="col-sm-2 control-label" id="a1">确认密码</label>
	    		<div class="col-sm-7">
	      			<input type="password" class="form-control" id="inputPassword3" placeholder="Re-Enter Password" name="password">
	      			<span></span>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="inputPassword3" class="col-sm-2 control-label">电话</label>
	    		<div class="col-sm-5">
	      			<input type="text" class="form-control" id="inputPassword3" placeholder="phone" name="phone">
	      			<span></span>
	    		</div>
	    		<div class="col-sm-2">
	    			<button id="send" type="button">发送验证码</button>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="inputPassword3" class="col-sm-2 control-label disabled">验证码</label>
	    		<div class="col-sm-7">
	      			<input type="vcode" class="form-control" id="inputPassword3" placeholder="vcode" name="vcode">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<div class="checkbox">
	       				<label>
	          				<input type="checkbox"> Remember me
	        			</label>
	      			</div>
	    		</div>
	  		</div>
	  		
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<div class="checkbox">
	       				<label>
	          				<input type="checkbox">通过点击此按钮,你将同意我我的  <a href="#">服务协议和条款.</a>	        			
	          			</label>
	      			</div>
	    		</div>
	  		</div>
	  		{{csrf_field()}}
	  		
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<button type="submit" class="btn btn-priamry" id="tzdl">现在注册</button>
	    		</div>
	  		</div>
		</form>
</div>
@stop
@section('js')
<script type="text/javascript">
	$(function(){

	$('#send').click(function(){
			// $.get('/message', {}, function(data){
			// 	console.log(data);
			// });
			//获取用户输入的手机号  name=phone
			var phone = $('input[name=phone]').val();
			// alert(phone);

			//检测用户的手机号格式是否正确
			var reg = /1\d{10}/;

			//检测
			if(!reg.test(phone)) {
				alert('手机号格式错误!!');
				return;
			}


			$.ajax({
				type:'get',
				data:{phone:phone},
				url: '/message',
				success: function(data){
					alert(data);
					console.log(data);
				}
			});
			//发送短信之后 1分钟之内不能点击该按钮
			$(this).addClass('disabled');
			var t = 5;
			//加倒计时
			var inte = setInterval(function(){
				$('#send').html(t+'秒之后再重新发送');
				t--;
				if(t < 0) {
					//停止定时器
					clearInterval(inte);
					//使按钮可点
					$('#send').removeClass('disabled');
					//更换文字
					$('#send').html('发送验证码');
				}
			}, 1000);

		});
		
	})
</script>
@stop
