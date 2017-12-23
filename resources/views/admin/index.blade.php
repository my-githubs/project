<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>蓝色珠宝</title>

    <!-- Bootstrap -->
    <link href="/administrator/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/administrator/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/administrator/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/administrator/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="/administrator/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/administrator/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/administrator/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/administrator/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/administrator/vendors/bootstrap-progressbar/css/style.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>网站后台</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{session('thumb')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{session("uname")}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
          @include('layouts.menu')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{session('thumb')}}" alt="">
                    <span>{{session('uname')}}</span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="/admin/signin"><i class="fa fa-sign-out pull-right"></i>退出</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        
      
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          @section('content')
            <div class="container">
              <div class="col-md-12">
                <div class="col-md-3 pull-left ziti">开发团队</div>
                <div class="col-md-3 pull-left ziti">开发时间</div>
                <div class="col-md-3 pull-left ziti">开发语言</div>
                <div class="col-md-3 pull-right ziti">指导教师</div>
              </div>
              <div class="col-md-12">
                <div class="col-md-3 pull-left juti">侯海乐&nbsp;王敏&nbsp;孙瑞双</div>
                <div class="col-md-3 pull-left juti">2017-12-04</div>
                <div class="col-md-3 pull-left juti">PHP&nbsp;&nbsp;Laravel框架</div>
                <div class="col-md-3 pull-right juti">李强</div>
              </div>
              <div class="clearfix"></div>
              <div class="top"></div>
              <div class="col-md-12 text-center">
                <h1><b>商城访问量</b></h1>
              </div>
              <div class="clearfix"></div>
              <div class="top"></div>
              <div class="container">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="col-md-12 col-sm-9 col-xs-12">
                    <div id="chart_plot_01" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" width="794" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 794px; height: 280px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 50px; text-align: center;">Jan 01</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 175px; text-align: center;">Jan 02</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 299px; text-align: center;">Jan 03</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 424px; text-align: center;">Jan 04</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 548px; text-align: center;">Jan 05</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 99px; top: 262px; left: 673px; text-align: center;">Jan 06</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 249px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 229px; left: 8px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 210px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 191px; left: 8px; text-align: right;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 172px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 153px; left: 8px; text-align: right;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 134px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 115px; left: 8px; text-align: right;">70</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 96px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 77px; left: 8px; text-align: right;">90</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 58px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 39px; left: 2px; text-align: right;">110</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 20px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">130</div></div></div><canvas class="flot-overlay" width="794" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 794px; height: 280px;"></canvas></div>
                  </div>
                  <div class="col-md-12 pull-right"></div>
                </div>
              </div>
            </div>
          @show
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/administrator/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/administrator/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/administrator/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/administrator/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/administrator/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/administrator/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/administrator/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/administrator/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/administrator/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/administrator/vendors/Flot/jquery.flot.js"></script>
    <script src="/administrator/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/administrator/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/administrator/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/administrator/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/administrator/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/administrator/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/administrator/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/administrator/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/administrator/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/administrator/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/administrator/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/administrator/vendors/moment/min/moment.min.js"></script>
    <script src="/administrator/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/administrator/build/js/custom.min.js"></script>
    <script type="text/javascript" src="/administrator/vendors/bootstrap/js/holder.min.js"></script>
  
  </body>
</html>
