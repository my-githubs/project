@extends('admin.index')


@section('content')
 <div class="center" role="main">
          <div class="row">
            <div class="page-title">
              <div class="title_left">
                <h3>管理员修改</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="/manger/{{$manger->uid}}" enctype="multipart/form-data">
                      </p>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">用户名 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="uname" required="required" class="form-control col-md-7 col-xs-12" value="{{$manger->uname}}">
                        </div>
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">密码</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">确认密码</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">头像 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img src="{{$manger->thumb}}">
                          <input type="file" class="form-control" name="thumb" value="">
                        </div>
                      </div>
                         {{csrf_field()}} 
                         {{method_field('PUT')}}
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">更新</button>
                          <button type="submit" class="btn btn-primary">重置</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection