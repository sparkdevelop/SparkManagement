<?php
require_once("management/header.php");
?>
<script src="/Spark/assets/js/spark_user.js" xmlns:v-on="http://www.w3.org/1999/xhtml"
        xmlns:v-on="http://www.w3.org/1999/xhtml"></script>
<div class="content">
    <div class="second-nav">
        <ul class="nav nav-pills">
            <li><a href="#">用户增长</a></li>
            <li class="active"><a href="#">用户折线</a></li>
            <li><a href="#">活跃用户</a></li>
            <li><a href="#">用户画像</a></li>
        </ul>
    </div>
    <br>
    <div class="clearfix">


        <i class="fa fa-user-md fa-5x gift" style="color: white ; text-align: center ; padding-top: 40px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 250px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">新增用户数</span></div>


        <i class="fa fa-users fa-4x user" style="color: white;text-align: center ; padding-top: 45px;float: left; margin-left: 5px"></i>
        <div class="" style="background-color:#ffffff ;text-align:center;width: 250px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['total_user']?></span><br/><span class="">总用户数</span></div>

    </div>

    <div id="incr_data" name="incr_data" style=" display='none' "><?php echo $incr_data?></div>
    <div id="total_data"  name="total_data" style=" display="none" "> <?php echo $total_data?> </div>
    <div id="api_url"  name="total_data" style=" display="none" "> <?php echo $api_url?> </div>
    <div id="start_date" name="start_date" displsy="none"><?php echo date('Y-m-d',strtotime('-1 day' ))?></div>
    <div id="end_date" name="end_date" displsy="none"><?php echo date('Y-m-d',strtotime('-7 day' ))?></div>

    <div id="user_list_table">
        <table class="table table-hover table-striped">
            <thead >
            <tr>
                <th>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="border: 0">
                            新增用户数
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">总用户数</a></li>
                        </ul>
                    </div></th>
                <th><div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="border: 0">
                      最近七天
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">总用户数</a></li>
                        </ul>
                    </div></th>
                <th>
                    <p> <div class="ta_date" id="div_date1">
                        <span class="date_title" id="date1"></span>
                        <a class="opt_sel" id="input_trigger1" href="#">
                            <i class="i_orderd"></i>
                        </a>
                    </div>
                    <div id="datePicker1"></div>
                    <br/>
                    <script type="text/javascript">
                        //var STATS_START_TIME = '1329148800';
                        var dateRange1 = new pickerDateRange('date1', {
                            isTodayValid : true,
                            startDate : $("#start_date").text(),
                            endDate : $("#end_date").text(),
                            needCompare : false,
                            defaultText : ' 至 ',
                            autoSubmit : true,
                            inputTrigger : 'input_trigger1',
                            theme : 'ta',
                            success : function(obj) {
                                $("#dCon2").html('开始时间 : ' + obj.startDate + '<br/>结束时间 : ' + obj.endDate);
                            }
                        });

                    </script></p>
                </th>
                <th style="text-align: right"><button type="button" class="btn btn-primary" id="date">按时间对比</button></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="4">
                    <div id="container" style="min-width:400px;height:400px"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
require_once("management/footer.php");
?>
