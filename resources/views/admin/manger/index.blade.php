    @extends('admin.index')
    @section('content')
    <div class="center" role="main">
     <div class="x_panel">
                  <div class="x_title">
                    <h2>管理员列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row">
                        <div class="col-sm-6">
                          <div class="dataTables_length" id="datatable-fixed-header_length">
                            <label>每页显示
                              <select aria-controls="datatable-fixed-header" class="form-control input-sm" name="num">
                                <option value="10" @if($num == 10)selected @endif>10</option>
                                          <option value="25" @if($num == 25) selected @endif>25</option>
                                          <option value="50" @if($num == 50) selected @endif>50</option>
                                          <option value="100" @if($num == 100) selected @endif>100</option>
                              </select>条
                            </label>
                          </div>
                        </div>
                      <div class="col-sm-6">
                        <div id="datatable-fixed-header_filter" class="dataTables_filter">
                          <label>关键字
                            <input type="search" name="keywords" style="width: 100px;height: 35px;" value="{{$keywords}}">
                          </label>
                          <button class="btn btn-info pull-right">搜索</button>
                        </div>
                      </div>
                          <div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 158px;">uid</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 158px;">用户名</th>
                          
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">头像</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 118px;">操作</th>
                      </thead>
                      <tbody>
                        @if(count($manger) > 0)
                            @foreach($manger as $k=>$v)
                            <tr class="gradeA odd" role="row">
                                <td class="sorting_1">{{$v->uid}}</td>
                                <td>{{$v->uname}}</td>
                                <td class="center"><img width="20" src="{{$v->thumb}}" alt=""></td>
                                <td class="center">
                                    <a class="btn btn-info btn-sm pull-left" href="/manger/{{$v->uid}}/edit">修改</a>
                                    <form class="del" action="/manger/{{$v->uid}}" method="post">
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

                    </table></div></div>
                   <div class="row">
    <div class="col-sm-12">
      <div class="dataTables_paginate paging_simple_numbers pull-right" id="datatable-fixed-header_paginate">
        {{ $manger->appends(['num'=>$num, 'keywords'=>$keywords])->links() }}
      </div>
    </div>
  </div>
                  </div>
                </div>
    </div>
    @stop
    @section('js')
<script>
$('.del').submit(function(e){
    if(!confirm('您确定要删除该用户么?')) return false;
});
</script>
@endsection