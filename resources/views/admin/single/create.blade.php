@extends('admin.index')

@section('content')

	<form class="form-horizontal form-label-left col-md-6" action="/single" method="post" enctype="multipart/form-data">
  <!-- <span class="section">请添加用户</span> -->

  <div class="form-group">
    <label for="">
      用户名:
    </label>
    <input class="form-control" type="text" name="username">
  </div>
  <div class="form-group">
    <label for="">
      邮箱:
    </label>
    <input class="form-control" type="text" name="email">
  </div>
  <div class="form-group">
    <label for="">
      密码:
    </label>
    <input class="form-control" type="password" name="password">
  </div>
  <div class="form-group">
    <label for="">
      确认密码:
    </label>
    <input class="form-control" type="password" name="password2">
  </div>
  <div class="form-group">
    <label for="">
      手机号:
    </label>
    <input class="form-control" type="text" name="phone">
  </div>
  <div class="form-group">
    <label for="">
      头像:
    </label>
    <input class="form-control" type="file" name="profile">
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