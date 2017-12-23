@extends('admin.index')

@section('title')
<h1 class="page-header">about信息更新</h1>
@endsection

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
<style type="text/css">
  img{
    width: 400px;
    height: 300px;
  }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="/about/{{$about->id}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <img src="{{$about->thumb}}" alt="">
                              <br>
                              <label for="">
                                图片:
                              </label>
                              <input class="form-control" type="file" name="thumb">
                            </div>
                            <div class="form-group">
                              <label for="">
                                名字:
                              </label>
                              <input class="form-control" type="text" name="name" value="{{$about->name}}">
                            </div>
                            <div class="form-group">
                              <label for="">
                                内容:
                              </label>
                              <script id="editor" type="text/plain" name="content" style="width:1024px;height:100px;">{{!!$about->content!!}}</script>
                            </div>
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default">添加</button>
                            <button type="reset" class="btn btn-default">重置</button>
                        </form>
                    </div>
                    
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection

@section('js')
<script>
    var ue = UE.getEditor('editor',{

    });
</script>
@endsection