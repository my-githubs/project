@extends('admin.index')

@section('head')
	<div class="row tile_count">
	<h1 class="col-md-8">相关产品列表</h1>
	</div>
@stop

@section('content')
<div class="x_panel">
	  <div class="x_title">
	    <h2>这是相关产品列表</h2>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	      </li>
	      <li><a class="close-link"><i class="fa fa-close"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">
	  	<form action="/relate">
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
		</form>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table id="datatable-fixed-header" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
			<thead>
	        <tr role="row">
	        	<th class="sorting_asc text-center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;" name='id'>
	        	ID
	        	</th>
	        	<th class="sorting_asc text-center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">
	        	相关产品价格
	        	</th>
	        	<th class="sorting text-center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">
	        	相关产品图
	        	</th>
	        	<th class="sorting text-center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">操作
	        	</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@if(count($relate) > 0)
	      	@foreach($relate as $k=>$v)
	      	<tr role="row" class="odd text-center" style="">
	          <td class="sorting_1">{{$v->id}}</td>
	          <td>{{$v->price}}</td>
	          <td>
	          	<img src="{{$v->pic}}" width="70">
	          </td>
	          <td>
                <form class="del" action="/relate/{{$v->id}}" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
				<button class="btn btn-danger btn-sm">删除</button>	
                </form>
	          </td>
	        </tr>
	        @endforeach
	        @else
	        <tr>
	        	<td colspan="5" class="text-center">暂无数据</td>
	        </tr>
            @endif
	    </tbody>
	    </table>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="dataTables_paginate paging_simple_numbers pull-right" id="datatable-fixed-header_paginate">
				{{ $relate->appends(['num'=>$num, 'keywords'=>$keywords])->links() }}
			</div>
		</div>
	</div>
	</div>
  </div>
</div>
@stop