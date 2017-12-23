@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">订单管理</h1>
	</div>
@stop

@section('content')
<form class="form-horizontal form-label-left" action="/order/{{$order->id}}" method="post" enctype="multipart/form-data">
  <!-- <span class="section">请添加用户</span> -->
  <h1>订单管理</h1>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">订单状态
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" required="required" type="text" name="status" value="{{$order->status}}">
    </div>
  </div>
  {{method_field('PUT')}}
  {{csrf_field()}}
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button id="send" type="submit" class="btn btn-success">发货</button>
      <input type="reset" value="重置" class="btn btn-success">
    </div>
  </div>
</form>
@stop


