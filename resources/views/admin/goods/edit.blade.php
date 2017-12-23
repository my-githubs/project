@extends('admin.index')

@section('head')
  <div class="row tile_count">
  <h1 class="col-md-8">商品修改</h1>
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

<form class="form-horizontal form-label-left col-md-6" action="/goods/{{$goods->id}}" method="post" enctype="multipart/form-data">
  <h1>请修改商品</h1>
  <hr>
  <div class="form-group">
    <label for="">
      商品名称:
    </label>
    <input class="form-control" type="text" name="title" value="{{$goods->title}}">
  </div>
  <div class="form-group">
    <label for="">
      价格:
    </label>
    <input class="form-control" type="text" name="price" value="{{$goods->price}}">
  </div>
  <div class="form-group">
    <label for="">
      库存:
    </label>
    <input class="form-control" type="text" name="kucun" value="{{$goods->kucun}}">
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
  {{method_field('PUT')}}
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button id="send" type="submit" class="btn btn-success">修改</button>
      <input type="reset" value="重置" class="btn btn-success">
    </div>
  </div>
</form>
@stop


