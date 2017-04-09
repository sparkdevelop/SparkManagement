<?php
require_once("management/header.php");
?>
<script src="/Spark/assets/js/spark_user.js" xmlns:v-on="http://www.w3.org/1999/xhtml"
        xmlns:v-on="http://www.w3.org/1999/xhtml"></script>
<div class="content">
<!--    <div class="second-nav">-->
<!--        <ul class="nav nav-pills">-->
<!--            <li><a href="#">用户增长</a></li>-->
<!--            <li class="active"><a href="#">用户折线</a></li>-->
<!--            <li><a href="#">活跃用户</a></li>-->
<!--            <li><a href="#">用户画像</a></li>-->
<!--        </ul>-->
<!--    </div>-->
    <p style="font-size: 15px">增加活跃</p>
    <br>
    <div class="clearfix">


        <i class="fa fa-user-md fa-4x last_up" style="color: white ; text-align: center ; padding-top: 28px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 150px;height: 100px;display: block;float: left;padding-top: 12px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">昨日新增用户</span></div>


        <i class="fa fa-user-md fa-4x last_active" style="color: white ; text-align: center ; padding-top: 28px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 150px;height: 100px;display: block;float: left;padding-top: 12px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">昨日活跃用户</span></div>

        <i class="fa fa-user-md fa-4x month_active" style="color: white ; text-align: center ; padding-top: 28px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 150px;height: 100px;display: block;float: left;padding-top: 12px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">月活跃用户</span></div>

        <i class="fa fa-user-md fa-4x total_num" style="color: white ; text-align: center ; padding-top: 28px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 150px;height: 100px;display: block;float: left;padding-top: 12px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">总用户数</span></div>

    </div>

    <div id="incr_data" name="incr_data" style=" display: none "><?php echo $incr_data?></div>
    <div id="total_data"  name="total_data" style=" display: none "> <?php echo $total_data?> </div>
    <div id="api_url"  name="total_data" style=" display: none "> <?php echo $api_url?> </div>
    <div id="start_date" class='start_date' name="start_date"style="display: none"><?php echo date('Y-m-d',strtotime('-1 day' ))?></div>
    <div id="end_date" class='end_date' name="end_date" style="display: none"><?php echo date('Y-m-d',strtotime('-7 day' ))?></div>

    <div id="user_list_table">
        <table class="active table table-hover table-striped">
            <thead>
            <tr style="border: 0px;margin: 0px;padding: 0px;">
                <th style="border: 0px;margin: 0px;padding: 0px;width:97px ;">
                    <button class="butn" style="border: 0px;margin: 0px;padding: 0px;" id="new_increment">新增用户数</button>
                    </th>
                <th style="border: 0px;margin: 0px;padding: 0px;width:97px ">
                    <button class="butn" style="border: 0px;margin: 0px;padding: 0px;">活跃用户数</button>
                </th>
                <th style="border: 0px;margin: 0px;padding: 0px;width:97px ">
                    <button class="butn" style="border: 0px;margin: 0px;padding: 0px;" id="total_num">总用户数</button>
                </th>
                <th style="border: 0px;margin: 0px;padding: 0px;width:97px "><div class="dropdown" style="border: 0px;margin: 0px;padding: 0px;width: 97px;height: 36px;font-size: 12px">
                        <button class="butn" type="button"
                                data-toggle="dropdown" style="border: 0; width: 97px;height: 36px;font-size: 12px">
                            <a style="color: black; text-decoration: none">最近七天</a>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="min-width: 97px">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="seven">最近七天</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="three">最近三天</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="th_ten">最近三十天</a></li>
                        </ul>
                    </div></th>
                <th style="border: 0px;margin: 0px;padding: 0px;width: 230px">
                   <p><div class="ta_date" style="margin-bottom: 4px;padding: 1.4px" id="div_date1">
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
                <th style="border: 0px;margin: 0px;padding: 0px;"><div class="dropdown" style="    border: 0px;margin: 0px;padding: 0px;">
                        <button class="butn" type="button" data-toggle="dropdown" style="border: 0;border: 0; width: 97px;height: 36px;font-size: 12px">
                          <a style="color: black; text-decoration: none">折线图</a>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="min-width: 97px">
                            <li role="presentation" id="line"><a role="menuitem" tabindex="-3" href="#">折线图</a></li>
<!--                            <li role="presentation" id="pie"><a role="menuitem" tabindex="-3" href="#">饼状图</a></li>-->
<!--                            <li role="presentation" id="squre"><a role="menuitem" tabindex="-2" href="#">柱状图</a></li>-->
                            <li role="presentation" id="squre"><a role="menuitem" tabindex="-1" href="#">柱状图</a></li>
                        </ul>
                    </div></th>
                <th style="text-align: right"><button type="button" class="btn-primary" id="compare" style="    padding: 1px;padding-left: 10px;padding-right: 10px;border: 1px;height: 22px;">按时间对比</button></th>
<!--            </tr>-->
            </thead>
            <tbody style="">
            <tr>
                <td colspan="7">
                    <div id="container1" style="height:400px"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="" >
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    <p><div class="ta_date" id="div_date2" style="padding: 1.4px">
                        <span class="date_title" id="date2"></span>
                        <a class="opt_sel" id="input_trigger2" href="#">
                            <i class="i_orderd"></i>
                        </a>
                    </div>
                    <div id="datePicker2"></div>
                    <br/>
                    <script type="text/javascript">
                        //var STATS_START_TIME = '1329148800';
                        var dateRange2 = new pickerDateRange('date2', {
                            isTodayValid : true,
                            startDate : $('.start_date').text(),
                            endDate : $('.end_date').text(),
                            needCompare : false,
                            defaultText : ' 至 ',
                            autoSubmit : true,
                            inputTrigger : 'input_trigger1',
                            theme : 'ta',
                            success : function(obj) {
                                $("#dCon2").html('开始时间 : ' + obj.startDate + '<br/>结束时间 : ' + obj.endDate);
                                $(".table-bordered tbody").empty();
                                var tdate = $.trim($("#date2").text().split("至")[0]);
                                var tdate1 = $.trim($("#date2").text().split("至")[1]);
                                var tdate_start = tdate.split("-")[0]+tdate.split("-")[1]+tdate.split("-")[2];
                                var tdate_end = tdate1.split("-")[0]+tdate1.split("-")[1]+tdate1.split("-")[2];
                                var period = tdate_end - tdate_start + 1;
                                var time_p = [];
                                var a,b,c;
                                for(var i = 0; i < period; i++){
                                    a = parseInt(tdate_start) +  i ;
                                    c = a.toString();
                                    b = c.substr(0,4)+'-'+c.substr(4,2)+'-'+c.substr(6,2);
                                    time_p.push(b);
                                }
                                for(var j = 0; j < period; j++){
                                    $(".table-bordered tbody").append("<tr><td>"+ time_p[j] +"</td><td>3</td><td>5</td><td>7</td><td>7</td><td>8</td></tr>");
                                }
                            }
//
                        });

                    </script></p>
                </th>
                <th style="font-weight: 900;font-size: 14px">新增用户数</th>
                <th style="font-weight: 900;font-size: 14px">活跃用户数</th>
                <th style="font-weight: 900;font-size: 14px">总用户数</th>
                <th style="font-weight: 900;font-size: 14px">新增用户数/活跃用户数</th>
                <th style="font-weight: 900;font-size: 14px">活跃用户数/总用户数</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php
    require_once("management/footer.php");
    ?>
