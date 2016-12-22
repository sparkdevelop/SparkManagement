/**
 * Created by hmmoshang on 16/11/28.
 */

$(function () {

    function jsonToArray(arr_like){
        var length = arr_like.length;
        for (i = 0; i < length; i++) {
            arr_like[i] = parseInt(arr_like[i]);
        }
        return arr_like;
    }


    obj_incr={
        show_data:jsonToArray(JSON.parse($("#incr_data").text())),
        //show_data:[7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2],
        show_date:$("#date1").val().split("至")[1]
    };

    obj_tot={
        show_data:JSON.parse($("#total_data").text()),
        show_date:$("#date1").val().split("至")[1]
    };

    console.info(obj_incr);


    $('#container').highcharts({
        title: {
            text: '用户变化曲线',
            x: -20 //center
        },
        subtitle: {
            text: '用户增长数',
            x: -20
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%Y-%m-%e'
        }},
        yAxis: {
            title: {
                text: '人'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
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





    function useIncrementChart(obj) {

        $('#container').highcharts({
            title: {
                text: $.trim(obj.text),
                x: -20 //center
            },
            subtitle: {

                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%Y-%m-%e'
                }
            },
            yAxis: {
                title: {},
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {},
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
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

    function useIncrementAjax(date){
        var api_url = $("#api_url").text();
        api_url = api_url + "";
        alert(api_url);
        alert(date);
        $.ajax({
            url: "http://localhost/Spark/index.php/user/User_analyse/info_chart1",
            data: date,
            type: "POST",
            dataType:"json",
            success:function(data){
                alert('dadasf');
                $("#incr_data").text(data["incr_data"]);
                $("#total_data").text(data["total_data"]);

            },
            error:function(data){

            },
            always:function(data){

            }
        })

    }




    $("#date").click(function () {
        var date = $.trim($("#date1").text().split("至")[0]);
        var date1 = $.trim($("#date1").text().split("至")[1]);
        var date_start = date.split("-")[0]+date.split("-")[1]+date.split("-")[2];
        var date_end = date1.split("-")[0]+date1.split("-")[1]+date1.split("-")[2];
        console.log(date_start);


        var ajax_date = {
            start_date: date_start,
            end_date: date_end
        };

        useIncrementAjax(ajax_date);

           var text = $("#dropdownMenu1").text(),
            data = [];
        if($.trim(text) == "新增用户数"){
            data = $("#incr_data").text();
        }else{
            data = $("#total_data").text();
        }
           var obj={
                text:text,
                date:date,
                data:jsonToArray(JSON.parse(data))
            };

        console.info(obj);
        console.info(obj.data);
        useIncrementChart(obj);

    });
});
//
//
// });
