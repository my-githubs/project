@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">Catelog添加</h1>
	</div>
@stop

@section('content')
	<div class="container">
		<div class="top" style="height: 100px;"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center" style="height: 50px;">
			<h1><b style="line-height: 50px;">Catelog添加</b></h1>
		</div>
		<div class="col-md-4"></div>
		<div class="clerfix"></div>
		<div class="top" style="height: 100px;"></div>
		<div class="col-md-12 pull-center">
			<h3 class="col-md-8">我&nbsp;们&nbsp;的&nbsp;&nbsp;Catelog</h3>
		</div>
		<div class="clerfix"></div>
		<div class="top" style="height:100px;"></div>
		<div class="clerfix"></div>
		<form class="form-horizontal form-label-left" action="/catelog" method="post" enctype="multipart/form-data">
			<div class="item form-group">
			    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone"><b>Catelog:</b>
			    </label>
			    <div class="col-md-6 col-sm-6 col-xs-12" style="height: 30px;">
			      <img src="" width="100">
			      <input type="file" name="profile" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" style="height: 50px;">
			    </div>
			</div>
  			{{csrf_field()}}
  			 <div class="top" style="height: 80px;"></div>
				  <div class="form-group">
				    <div class="col-md-6 col-md-offset-3">
				      <button id="send" type="submit" class="btn btn-success" style="width: 80px; ">添加</button>
				      <input type="reset" value="重置" class="btn btn-success" style="width: 80px;margin-left: 30px;">
				    </div>
				  </div>
		</form>

		<div class="clerfix"></div>
	</div>
@stop