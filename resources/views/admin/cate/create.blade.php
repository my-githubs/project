@extends('admin.index')

@section('title')
<h1 class="page-header"></h1>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h1>分类添加</h1>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Settings 1</a>
          </li>
          <li><a href="#">Settings 2</a>
          </li>
        </ul>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br>
    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" role="form" action="/cate" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">分类名称 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">父级分类 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="pid">
              <option value="0">顶级分类</option>
              @foreach($cates as $k=>$v)
              <option value="{{$v->id}}">{{$v->name}}</option>
              @endforeach
          </select>
        </div>
      </div>   
        <div class="ln_solid"></div>
        {{csrf_field()}}
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success">提交</button>
          <button class="btn btn-primary" type="reset">重置</button>   
        </div>          
    </form>
  </div>
</div>
</div>
@endsection