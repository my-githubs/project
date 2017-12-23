@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">用户修改</h1>
	</div>
@stop

@section('content')
<form class="form-horizontal form-label-left" action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">
  <!-- <span class="section">请添加用户</span> -->

  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">用户名:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" required="required" type="text" name="username" value="{{$user->username}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">邮箱:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->email}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">手机:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="{{$user->phone}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">头像:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <img src="{{$user->profile}}" width="100">
      <input type="file" name="profile" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  {{method_field('PUT')}}
  {{csrf_field()}}
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button id="send" type="submit" class="btn btn-success">添加</button>
      <input type="reset" value="重置" class="btn btn-success">
    </div>
  </div>
</form>
@stop


