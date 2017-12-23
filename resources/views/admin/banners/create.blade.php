@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">Banner图添加</h1>
	</div>
@stop
@section('content')
<form class="form-horizontal form-label-left col-md-6" action="/banners" method="post" enctype="multipart/form-data">
  <span class="section">请添加banner图</span>
  <div class="form-group">
    <label for="">
      标题:
    </label>
    <input class="form-control" type="text" name="title">
  </div>
  <div class="form-group">
    <label for="">
      banner图:
    </label>
    <input class="form-control" type="file" name="pic">
  </div>
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