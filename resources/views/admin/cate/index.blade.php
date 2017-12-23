@extends('admin.index')

@section('title')
<h1 class="page-header">分类列表</h1>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
    <div class="clearfix"></div>
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
      <div class="row col-md-12"> 
      <form action="/cate">
        <div class="page-title">
              <div class="title_left">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">每页显示
                    </label>
                    <div class="col-sm-2">         
                      <div class="input-group">
                         <select name="num" aria-controls="dataTables-example" class="form-control input-sm">
                            <option value="10" @if($num == 10) selected @endif>10</option>
                            <option value="25" @if($num == 25) selected @endif>25</option>
                            <option value="50" @if($num == 50) selected @endif>50</option>
                            <option value="100" @if($num == 100) selected @endif>100</option>
                        </select>   
                      </div>       
                    </div>
                    <span class="pull-left">条</span>
                  </div>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input class="form-control" placeholder="关键字" type="text">
                    <span class="input-group-btn">
                      <button class="btn btn-default">搜索</button>
                    </span>
                  </div>
                </div>
              </div>
        </div>    
    </form> 
    <div class="x_content">
      <table class="table table-bordered">
        <thead>
          <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 185px;">ID</th>
              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">用户名</th>
              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">操作</th>
          </tr>
      </thead>
      <tbody>
        @if(count($cates) > 0)
          @foreach($cates as $k=>$v)
            <tr class="gradeA odd" role="row">
                <td class="sorting_1">{{$v->id}}</td>
                <td>{{$v->name}}</td>               
                <td class="center">
                  <a class="btn btn-info btn-sm pull-left" href="/cate/{{$v->id}}/edit">修改</a>
                      <form class="del" action="/cate/{{$v->id}}" method="post">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                      <button class="btn btn-danger btn-sm">删除</button> 
                      </form>
                </td>
            </tr>
            @endforeach
          @else
          <tr><td colspan="5" class="text-center">暂无数据</td></tr>
          @endif
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection

@section('js')
<script>
$('.del').submit(function(e){
    if(!confirm('您确定要删除该分类么?')) return false;
});
</script>
@endsection