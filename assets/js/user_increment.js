/**
 * Created by hmmoshang on 16/11/28.
 */

$(function () {
    // 获取用户想要观察的数据源
    var target_click;
    $(".table-hover th button:lt(3)").each(function () {
        $(this).click(function () {
     target_click = $(this).text();
        })
    });
    // 下拉列表的切换
    $(".table-hover th button:gt(2)").each(function () {
        $("ul li a").click(function () {
           $(this).parents("ul").siblings("button").find("a").text($(this).text());
            $(this).parents("ul").siblings("button").find("a").css("color","white");
            // $(this).text($(this).parents("ul").siblings("button").text());
        })
    });


// 最开始数据的展现来源
    function jsonToArray(arr_like){
        var length = arr_like.length;
        for (i = 0; i < length; i++) {
            arr_like[i] = parseInt(arr_like[i]);
        }
        return arr_like;
    }


    obj_incr={
        show_data:jsonToArray(JSON.parse($("#incr_data").text())),
        //show_data:[7.0, 6.9, 9.5c, 14.5, 18.2, 21.5, 25.2],
        show_date:$("#date1").val().split("至")[1]
    };

    obj_tot={
        show_data:JSON.parse($("#total_data").text()),
        show_date:$("#date1").val().split("至")[1]
    };


// 获取最近七天,三天,现在,三十天的时间
  var myDate = new Date();
    var year = myDate.getFullYear();
    var month = myDate.getMonth() + 1;
    var date = myDate.getDate();
  var now = year+'-'+'0'+month+'-'+date;
    var myDate1 = new Date(myDate.getTime() - 6*24*3600*1000);
    var year1 = myDate1.getFullYear();
    var month1 = myDate1.getMonth() + 1;
    var date1 = myDate1.getDate();
    var se_before = year1+'-'+'0'+month1+'-'+date1;
    var myDate2 = new Date(myDate.getTime() - 2*24*3600*1000);
    var year2 = myDate2.getFullYear();
    var month2 = myDate2.getMonth() + 1;
    var date2 = myDate2.getDate();
    var th_before = year2+'-'+'0'+month2+'-'+date2;
    var myDate3 = new Date(myDate.getTime() - 29*24*3600*1000);
    var year3 = myDate3.getFullYear();
    var month3 = myDate3.getMonth() + 1;
    var date3 = myDate3.getDate();
    var ten_before = year3+'-'+'0'+month3+'-'+date3;
// 最开始绘图

    var tdate_start = se_before.split("-")[0]+se_before.split("-")[1]+se_before.split("-")[2];
    var tdate_end = now.split("-")[0]+now.split("-")[1]+now.split("-")[2];
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



    $('#container1').highcharts({
        credits:{
            enabled:false
        },
        title: {
            text: '用户变化曲线',
            x: -20 //center
        },
        subtitle: {
            text: '新增用户数',
            x: -20
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%Y-%m-%e'
        }},
        yAxis: {
            type: 'linear',
            tickColor:'red',
            tickLength:'20px',
            title: {
                text: '人数'
            },
            // plotLines: [{
            //     value: 3,
            //     width: 2,
            //     color: 'red',
            //     dashStyle:'solid'
            // }]
        },
        tooltip: {
            xDateFormat: '%Y-%m-%d'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '新增用户数',
            data: obj_incr.show_data,
            pointStart: Date.UTC(obj_incr.show_date.split("-")[0],obj_incr.show_date.split("-")[1] - 1,obj_incr.show_date.split("-")[2]),
            pointInterval: 24 * 3600 * 1000
        }]
    });


    $('#container2').highcharts({
        credits:{
            enabled:false
        },
        title: {
            text: '用户变化曲线',
            x: -20 //center
        },
        subtitle: {
            text: '日留存率',
            x: -20
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%Y-%m-%e'
            }},
        yAxis: {
            type: 'linear',
            tickColor:'red',
            tickLength:'20px',
            title: {
                text: '人数'
            },
            // plotLines: [{
            //     value: 3,
            //     width: 2,
            //     color: 'red',
            //     dashStyle:'solid'
            // }]
        },
        tooltip: {
            xDateFormat: '%Y-%m-%d'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '日留存率',
            data: obj_incr.show_data,
            pointStart: Date.UTC(obj_incr.show_date.split("-")[0],obj_incr.show_date.split("-")[1] - 1,obj_incr.show_date.split("-")[2]),
            pointInterval: 24 * 3600 * 1000
        }]
    });
// 选择栏选择样式切换
$(".table-hover th button").each(function () {
    $(this).click(function () {
        // $(this).css("background-color","");
        // $(this).css("color","");
        $(this).find("a").css("color","white");
        $(".table-hover th button").removeClass("clicking");
        $(this).parents("th").siblings("th").find("a").css("color","black");
        $(this).addClass("clicking");
    })
});
// 折线图函数
    function useIncrementChart(obj) {

        $('#container1').highcharts({
            credits:{
                enabled:false
            },
            title: {
                text: '用户变化曲线',
                x: -20 //center
            },
            subtitle: {
                text: obj.text,
                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%Y-%m-%e'
                }
            },
            yAxis: {
                title: {
                    text: '人数'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {xDateFormat: '%Y-%m-%d'},
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                type:"line",
                name: obj.text,
                data: obj.data,
                pointStart: Date.UTC(obj.date.split('-')[0], obj.date.split('-')[1] - 1, obj.date.split('-')[2]),
                pointInterval: 24 * 3600 * 1000

            }]
        });


    }
// 柱状图函数
    function useIncrementChart1(obj) {

        $('#container2').highcharts({
            credits:{
                enabled:false
            },
            title: {
                text: '用户变化曲线',
                x: -20 //center
            },
            subtitle: {
                text: obj.text,
                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%Y-%m-%e'
                }
            },
            yAxis: {
                title: {
                    text: '人数'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {xDateFormat: '%Y-%m-%d'},
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                type:"line",
                name: obj.text,
                data: obj.data,
                pointStart: Date.UTC(obj.date.split('-')[0], obj.date.split('-')[1] - 1, obj.date.split('-')[2]),
                pointInterval: 24 * 3600 * 1000

            }]
        });


    }
    function usebarChart(obj) {

        $('#container1').highcharts({
            credits:{
                enabled:false
            },
            title: {
                text: '用户变化曲线',
                x: -20 //center
            },
            subtitle: {
                text: obj.text,
                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%Y-%m-%e'
                }
            },
            yAxis: {
                title: {
                    text: '人数'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {xDateFormat: '%Y-%m-%d'},
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                type:"column",
                name: obj.text,
                data: obj.data,
                pointStart: Date.UTC(obj.date.split('-')[0], obj.date.split('-')[1] - 1, obj.date.split('-')[2]),
                pointInterval: 24 * 3600 * 1000

            }]
        });


    }
    function usebarChart1(obj) {

        $('#container2').highcharts({
            credits:{
                enabled:false
            },
            title: {
                text: '用户变化曲线',
                x: -20 //center
            },
            subtitle: {
                text: obj.text,
                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%Y-%m-%e'
                }
            },
            yAxis: {
                title: {
                    text: '人数'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {xDateFormat: '%Y-%m-%d'},
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                type:"column",
                name: obj.text,
                data: obj.data,
                pointStart: Date.UTC(obj.date.split('-')[0], obj.date.split('-')[1] - 1, obj.date.split('-')[2]),
                pointInterval: 24 * 3600 * 1000

            }]
        });


    }
    //
//
//
// 将中划线去掉，然后只剩下8位数字
// ajax传数据
    function useIncrementAjax(date){
        var api_url = $("#api_url").text();
        api_url = api_url + "";
        console.log(date);
        $.ajax({
            url: "http://localhost/Spark/index.php/user/User_analyse/info_chart1",
            data: date,
            type: "POST",
            dataType:"json",
            async:false,
            success:function(data){
                // console.info(data);
                // alert('dadasf');
                $("#incr_data").text(data["incr_data"]);
                $("#total_data").text(data["total_data"]);
            },
            error:function(data){
                // console.log('error');

            },
            always:function(data){
                // alert('dadasf');
                // $("#incr_data").text(data["incr_data"]);
                // $("#total_data").text(data["total_data"]);
            }
        })

    }

   // 新增用户数点击

    $("#new_increment").click(function () {
        if($(".active th button:eq(3)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近七天"){
            var date = se_before;
            var date1 = now;
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

           var text = $("#new_increment").text();


        if($.trim(text) == "新增用户数"){
            data = $("#incr_data").text();
            console.info(data);
        }
        // else{
        //     data = $("#total_data").text();
        // }
           var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

        // console.info(obj);
        // console.info(obj.data);
        if($(".active th button:eq(4)").find("a").text() == "柱状图"){
            usebarChart(obj);
        }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
            // alert("444444");
            useIncrementChart(obj);
        }

    });
    $("#retain").click(function () {
        if($(".retain th button:eq(1)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".retain th button:eq(1)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else if($(".retain th button:eq(1)").find("a").text() == "最近七天"){
            var date = se_before;
            var date1 = now;
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);





            data = $("#incr_data").text();


        // else{
        //     data = $("#total_data").text();
        // }
        var obj={
            text:text,
            date:date,
            data:jsonToArray(JSON.parse(data))
        };

        // console.info(obj);
        // console.info(obj.data);
        if($(".retain th button:eq(2)").find("a").text() == "柱状图"){
            usebarChart1(obj);
        }else if($(".retain th button:eq(2)").find("a").text() == "折线图"){
            // alert("444444");
            useIncrementChart1(obj);
        }

    });
    // 时间对比点击
    $("#compare").click(function () {
        var date = $.trim($("#date1").text().split("至")[0]);
        var date1 = $.trim($("#date1").text().split("至")[1]);
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);

        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = target_click;
        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };
            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }

    });

    $("#compare1").click(function () {
        var date = $.trim($("#date1").text().split("至")[0]);
        var date1 = $.trim($("#date1").text().split("至")[1]);
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);

        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);




        data = $("#incr_data").text();
            var obj={
                text:"日留存率",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };
            if($(".retain th button:eq(2)").find("a").text() == "柱状图"){
                usebarChart1(obj);
            }else if($(".retain th button:eq(2)").find("a").text() == "折线图"){
                useIncrementChart1(obj);
            }

    });
// 总用户数点击
    $("#total_num").click(function () {
        if($(".active th button:eq(3)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近七天"){
            var date = se_before;
            var date1 = now;
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = $("#total_num").text();


        if($.trim(text) == "总用户数"){
            data = $("#total_data").text();
            console.info(data);
        }
        // else{
        //     data = $("#total_data").text();
        // }
        var obj={
            text:text,
            date:date,
            data:jsonToArray(JSON.parse(data))
        };
// alert(date_start);
        // console.info(obj);
        // console.info(obj.data);
        if($(".active th button:eq(4)").find("a").text() == "柱状图"){
            usebarChart(obj);
        }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
            useIncrementChart(obj);
        }

    });

    $("#three").click(function () {
        var date = th_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = target_click;
        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                // alert('11111');
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                // alert("2222");
                useIncrementChart(obj);
            }
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }

        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });
    $("#rthree").click(function () {
        var date = th_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);


            data = $("#incr_data").text();
            var obj={
                text:"日留存率",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".retain th button:eq(2)").find("a").text() == "柱状图"){
                // alert('11111');
                usebarChart1(obj);
            }else if($(".retain th button:eq(2)").find("a").text() == "折线图"){
                // alert("2222");
                useIncrementChart1(obj);
            }



        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });

    $("#rseven").click(function () {
        var date = se_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);


        data = $("#incr_data").text();
        var obj={
            text:"日留存率",
            date:date,
            data:jsonToArray(JSON.parse(data))
        };

        if($(".retain th button:eq(2)").find("a").text() == "柱状图"){
            // alert('11111');
            usebarChart1(obj);
        }else if($(".retain th button:eq(2)").find("a").text() == "折线图"){
            // alert("2222");
            useIncrementChart1(obj);
        }



        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });

    $("#rth_ten").click(function () {
        var date = ten_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);


        data = $("#incr_data").text();
        var obj={
            text:"日留存率",
            date:date,
            data:jsonToArray(JSON.parse(data))
        };
        if($(".retain th button:eq(2)").find("a").text() == "柱状图"){
            // alert('11111');
            usebarChart1(obj);
        }else if($(".retain th button:eq(2)").find("a").text() == "折线图"){
            // alert("2222");
            useIncrementChart1(obj);
        }



        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });
    $("#th_ten").click(function () {
        var date = ten_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = target_click;
        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }

        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });
    $("#seven").click(function () {
        var date = se_before;
        var date1 = now;
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };
// alert(date_start);
        useIncrementAjax(ajax_date);
        var text = target_click;
        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };
// alert("hahha");
            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };
            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            if($(".active th button:eq(4)").find("a").text() == "柱状图"){
                usebarChart(obj);
            }else if($(".active th button:eq(4)").find("a").text() == "折线图"){
                useIncrementChart(obj);
            }
        }

        // var obj={
        //     text:text,
        //     date:date,
        //     data:jsonToArray(JSON.parse(data))
        // };
        //
        // useIncrementChart(obj);

    });
    $("#line").click(function () {
        if($(".active th button:eq(3)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else {
            var date = $.trim($("#date1").text().split("至")[0]);
            var date1 = $.trim($("#date1").text().split("至")[1]);
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = target_click;

        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            useIncrementChart(obj);
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            useIncrementChart(obj);
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            useIncrementChart(obj);
        }

    });
    $("#rline").click(function () {

        if($(".retain th button:eq(1)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".retain th button:eq(1)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else {
            var date = $.trim($("#date1").text().split("至")[0]);
            var date1 = $.trim($("#date1").text().split("至")[1]);
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);




            data = $("#incr_data").text();
            var obj={
                text:"日留存率",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            useIncrementChart1(obj);

    });
    // $("#catter").click(function () {
    //     var date = $.trim($("#date1").text().split("至")[0]);
    //     var date1 = $.trim($("#date1").text().split("至")[1]);
    //     var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
    //     var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
    //     // console.log(date_start);
    //
    //
    //     var ajax_date = {
    //         start_date: date_start,
    //         end_date: date_end
    //     };
    //
    //     useIncrementAjax(ajax_date);
    //
    //     var text = target_click;
    //
    //     if(target_click == "新增用户数"){
    //         data = $("#incr_data").text();
    //         var obj={
    //             text:text,
    //             date:date,
    //             data:jsonToArray(JSON.parse(data))
    //         };
    //
    //         usescatterChart(obj);
    //     }else if(target_click == "总用户数"){
    //         data = $("#total_data").text();
    //         var obj={
    //             text:text,
    //             date:date,
    //             data:jsonToArray(JSON.parse(data))
    //         };
    //
    //         usescatterChart(obj);
    //     }else {
    //         data = $("#incr_data").text();
    //         var obj={
    //             text:"新增用户数",
    //             date:date,
    //             data:jsonToArray(JSON.parse(data))
    //         };
    //
    //         usescatterChart(obj);
    //     }
    //
    // });
    $("#rsqure").click(function () {
        if($(".retain th button:eq(1)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".retain th button:eq(1)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else {
            var date = $.trim($("#date1").text().split("至")[0]);
            var date1 = $.trim($("#date1").text().split("至")[1]);
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);




        data = $("#incr_data").text();
        var obj={
            text:"日留存率",
            date:date,
            data:jsonToArray(JSON.parse(data))
        };

        usebarChart1(obj);

    });
    $("#squre").click(function () {
        if($(".active th button:eq(3)").find("a").text() == "最近三十天"){
            var date = ten_before;
            var date1 = now;
        }else if($(".active th button:eq(3)").find("a").text() == "最近三天"){
            var date = th_before;
            var date1 = now;
        }else {
            var date = $.trim($("#date1").text().split("至")[0]);
            var date1 = $.trim($("#date1").text().split("至")[1]);
        }
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        // console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

        var text = target_click;
        if(target_click == "新增用户数"){
            data = $("#incr_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            usebarChart(obj);
        }else if(target_click == "总用户数"){
            data = $("#total_data").text();
            var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            usebarChart(obj);
        }else {
            data = $("#incr_data").text();
            var obj={
                text:"新增用户数",
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

            usebarChart(obj);
        }

    });
});
//
//
// });
