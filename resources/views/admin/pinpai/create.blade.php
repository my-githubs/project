@extends('admin.index')

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
	<div class="row tile_count">
	<h1 class="col-md-8">品牌添加</h1>
	</div>
	<form class="form-horizontal form-label-left col-md-6" action="/pinpai" method="post" enctype="multipart/form-data">
  <span class="section">请添加品牌</span>
  <div class="form-group">
    <label for="">
      品牌名称:
    </label>
    <input class="form-control" type="text" name="pname">
  </div>
  <div class="form-group">
    <label for="">
      品牌编号:
    </label>
    <input class="form-control" type="text" name="status">
  </div>
  <div class="form-group">
    <label for="">
      品牌详情:
    </label>
    <script id="editor" type="text/plain" name="content" style="width:1024px;height:100px;"></script>
  </div>
  <div class="form-group">
    <label for="">
      品牌代表图片:
    </label>
    <input class="form-control" type="file" name="thumb">
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