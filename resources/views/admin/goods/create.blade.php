@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">商品添加</h1>
	</div>
@stop

@section('content')
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    var ue = UE.getEditor('editor',{
        // toolbars: [
        //     ['fullscreen', 'source', 'undo', 'redo', 'bold']
        // ]
    });
</script>

<form class="form-horizontal form-label-left col-md-6" action="/goods" method="post" enctype="multipart/form-data">
  <span class="section">请添加用户</span>
   
  <div class="form-group">
    <label for="">
      商品名称:
    </label>
    <input class="form-control" type="text" name="title">
  </div>
  <div class="form-group">
    <label for="">
      价格:
    </label>
    <input class="form-control" type="text" name="price">
  </div>
  <div class="form-group">
    <label for="">
      库存:
    </label>
    <input class="form-control" type="text" name="kucun">
  </div>
  <div class="form-group">
    <label for="">
      商品图片:
    </label>
    <input class="form-control" type="file" name="pic[]" multiple>
  </div>
  <div class="form-group">
    <label for="">
      商品详情:
    </label>
    <script id="editor" type="text/plain" name="content" style="width:1024px;height:100px;"></script>
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


