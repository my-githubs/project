@extends('admin.index') 

@section('title')
<h1 class="page-header">about列表</h1> 
@endsection 

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">       
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                	<form action="/about">
	                    <div class="row">
	                        <div class="col-sm-6">
	                            <div class="dataTables_length" id="dataTables-example_length">
	                                <label>每页显示
	                                    <select name="num" aria-controls="dataTables-example" class="form-control input-sm">
	                                        <option value="10" @if($num == 10) selected @endif>10</option>
	                                        <option value="25" @if($num == 25) selected @endif>25</option>
	                                        <option value="50" @if($num == 50) selected @endif>50</option>
	                                        <option value="100" @if($num == 100) selected @endif>100</option>
	                                    </select> 条</label>
	                            </div>
	                        </div>
	                        <div class="col-sm-6 text-right">
	                            <div id="dataTables-example_filter" class="dataTables_filter">
	                                <label>关键字:
	                                    <input type="search" value="{{$keywords}}" name="keywords" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">&nbsp;<button class="btn btn-sm btn-info">搜索</button>
	                                </label>
	                            </div>
	                        </div>
	                    </div>
	                </form>
                     <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">图片</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;">名字</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">内容</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if(count($about) > 0)
	                                	@foreach($about as $k=>$v)
	                                    <tr class="gradeA odd" role="row">
                                            <td><input type="checkbox" name=""></td>
                                            <td class="center"><img width="20" src="{{$v->thumb}}" alt=""></td>
	                                        <td class="sorting_1">{{$v->name}}</td>
	                                        <td>{{$v->content}}</td>
	                                        <td class="center">
	                                        	<a class="btn btn-info btn-sm pull-left" href="/about/{{$v->id}}/edit">修改</a>
                                                <form id="del" action="/about/{{$v->id}}" method="post">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
												<button class="btn btn-danger btn-sm center-block">删除</button>
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
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                {{ $about->appends(['num'=>$num, 'keywords'=>$keywords])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
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
$('#del').submit(function(){
	var res=confirm('你确定要删除该信息吗?');
	if (!res) {
		return false;
	}
});
</script>
@endsection
