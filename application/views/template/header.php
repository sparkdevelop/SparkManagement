<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sparkspace">
    <meta name="keyword" content="">

    <link rel="shortcut icon" href="img/favicon.ico">

    <title>火花后台</title>

    <!-- core CSS -->
    <link href="/SparkManagement/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet" >
    <link href="/SparkManagement/assets/css/main.css" rel="stylesheet">
    <link href="/SparkManagement/assets/css/table.css" rel="stylesheet">
    <link href="/SparkManagement/assets/css/user.css" rel="stylesheet">
    <link href="/SparkManagement/assets/datepicker/dateRange.css" rel="stylesheet">

    <!-- core js -->
    <script src="/SparkManagement/assets/js/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="/SparkManagement/assets/js/vue.js"></script>
    <script src="/SparkManagement/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/SparkManagement/assets/bootstrap/js/collapse.js"></script>
    <script src="/SparkManagement/assets/bootstrap/js/transition.js"></script>
    <script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
    <script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>
    <script src="/SparkManagement/assets/datepicker/dateRange.js"></script>

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
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-home fa-fw"></i>&nbsp; <a href="/SparkManagement/index.php">首页</a></a>
                        </h4>
                    </div>

                </div>

                <!-- nav data -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-bar-chart fa-fw"></i>&nbsp; 数据分析</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="/SparkManagement/index.php/user_analyse/User_analyse/info_data" target="_blank">用户分析</a>
                            <a href="/SparkManagement/index.php/content_analyse/Word_analyse/get_active" target="_blank">内容分析</a>
                        </div>
                    </div>
                </div>

                <!-- nav user -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-user fa-fw"></i>&nbsp; 用户管理</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="/SparkManagement/index.php/user_manage/User_list" target="_blank">用户列表</a>
                            <a>用户贡献</a>
                            <a>用户组权限</a>
                            <a>封禁用户</a>
                            <a>群发消息</a>
                        </div>
                    </div>
                </div>

                <!-- nav content -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-file-text fa-fw"></i>&nbsp; 内容管理</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
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

            </div>
            <!-- collapse end -->
        </div>