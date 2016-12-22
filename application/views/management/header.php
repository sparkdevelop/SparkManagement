<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sparkspace">
    <meta name="keyword" content="">

    <link rel="shortcut icon" href="img/favicon.ico">

  <title>导航</title>


  <!-- Bootstrap core CSS -->
  <script src="../../../assets/js/jquery-1.11.3.min.js"></script>
  <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../assets/css/main.css" rel="stylesheet">
  <link href="../../../assets/css/table.css" rel="stylesheet">
  <link href="../../../assets/css/user.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
  <script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>
  <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../../assets/bootstrap/js/collapse.js"></script>
  <script src="../../../assets/js/user_increment.js"></script>
  <script src="../../../assets/bootstrap/js/transition.js"></script>
  <script src="../../../assets/datepicker/dateRange.js"></script>
  <link href="../../../assets/datepicker/dateRange.css" rel="stylesheet">


</head>

<body>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 col-sm-12" id="head">
        <i class="fa fa-navicon fa-lg" id="menu"></i>
        <a href="index.html" id="logo"><span>火花空间</span></a>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><i class="fa fa-sign-in fa-fw"></i> 登录</a></li>
        </ul>
      </div>     
    </div>

    <div class="row">

      <div class="col-lg-3" id="sidebar-left">
      
      <!-- collapse start -->
      <div class="panel-group" id="accordion">
        
        <!-- nav index -->
        <div class="panel panel-default">        
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-home fa-fw"></i>&nbsp; 首页</a>
            </h4>     
          </div>

        </div>

        <!-- nav content -->
        <div class="panel panel-default">        
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-file-text fa-fw"></i>&nbsp; 内容</a>
            </h4>     
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <a>所有页面</a>
              <a>监视页面</a>
              <a>待完善</a>
              <a>删除页面</a>
              <a>导入页面</a>
              <a>日志</a>
              <a>分类</a>
            </div>
          </div>          
        </div>
        
        <!-- nav user -->
        <div class="panel panel-default">        
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-user fa-fw"></i>&nbsp; 用户</a>
            </h4>     
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
              <a href="">用户列表</a>
              <a>用户贡献</a>
              <a>用户组权限</a>
              <a>封禁用户</a>
              <a>群发消息</a>
            </div>
          </div>          
        </div>

        <!-- nav data -->
        <div class="panel panel-default">        
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart fa-fw"></i>&nbsp; 运营</a>
            </h4>     
          </div>
          <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
              <a>用户分析</a>
                <a href="http://localhost/Spark/index.php/user/User_analyse/info_chart#">用户折线</a>
                <a href="http://localhost/Spark/index.php/user/User_analyse/info_data#">用户增长</a>
              <a>内容分析</a>

            </div>
          </div>          
        </div>
        
        </div>
        <!-- collapse end -->
      </div>