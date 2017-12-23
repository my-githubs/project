@extends('layouts.home')

@section('content')	
<style>
	.top{
		height: 30px;
	}
</style>
<div class="container">
	<div class="col-sm-6 pull-left">
		<div class="top"></div>
		<h2><b>Login</b></h2>
		<div class="top"></div>
		<div class="col-sm-12">
 			<p>欢迎, 请按照以下步骤完成登录.</p>
			<p>如果你以前登录过我们, <a href="">请点击这里</a></p>
			</div>
			<div class="clearfix"></div>
			<div class="top"></div>
		<form class="form-horizontal" action="/login" method="post">
	  		<div class="form-group">
	    		<label for="inputEmail3" class="col-sm-12 text-left">用户名</label>
	    		<div class="col-sm-8">
	      			<input type="name" class="form-control" id="inputEmail3" style="color: #666;" name="username">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="inputPassword3" class="col-sm-12 text-left">密码</label>
	    		<div class="col-sm-8">
	      			<input type="password" class="form-control" id="inputPassword3" name="password">
	      			{{csrf_field()}}
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
	          				<input type="checkbox"> 忘记密码
	        			</label>
	      			</div>
	   			</div>
	  		</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<button type="submit" class="btn btn-primary">现在登录</button>
	    		</div>
	  		</div>
		</form>
</div>
<div class="col-sm-6 pull-right">
	<div class="top"></div>
	<h3>New Registration</h3>
	<div class="top"></div>
	<div class="col-sm-12">
 		<p>通过创建一个帐户与我们的商店,你将能够完成结帐过程更快,移动存储多个航运地址,查看和跟踪你的订单在你的帐户和更多。<a href="#">请点击这里</a></p>
		</div>
		<div class="clearfix"></div>
		<div class="top"></div>
		<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      	<button type="submit" class="btn bg-color color"><a href="/signup">创建用户</a></button>
	    </div>
	</div>
</div>
</div>
@stop