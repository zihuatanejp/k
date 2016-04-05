<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="cal/jquery-ui.css">
<link href="cal/fullcalendar_print.css" rel="stylesheet">
<link href="cal/fullcalendar.css" rel="stylesheet" media="print">

<link href="css/app.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
        
<!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
	#calendar {
		width:100%;
        margin: 40px 0px;
	}
    body{
        margin: 0px;
    }
    /*当前日期以后的日期显示*/
    .fc-day-number.fc-future{
        opacity: 0.3;
        filter: alpha(opacity=30);
    }
    .fc th, .fc td{
        border-width:2px;
    }
    /*当前日期的显示*/
    .fc-unthemed .fc-today{
        background: #FCF8E3 none repeat scroll 0% 0%;
    }
    /*当前日期之前的日期显示*/
    .fc-unthemed .fc-past{
        background: auto;
    }
    .row[class~=no-gutter] div[class^="col-"]{
        padding-left: 0px;
        padding-right: 0px;
    }

    /*不显示日历的滚动条*/
    .fc-day-grid-container{
        height:auto !important;
    }
    .fc-toolbar .fc-left h2{
        font-size: 16px;
        line-height: 30px;
    }
</style>
</head>
<body>
    
	<div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3">

                <div class="fc fc-ltr fc-unthemed" id="calendar"></div>

            </div>
        </div>
    </div>



<script src="cal/moment.js"></script>
<script src="cal/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="cal/fullcalendar.js"></script>
<script src="cal/zh-cn.js"></script>
<script>
    $(function(){

        function renderCal(){
            $('#calendar').fullCalendar({
                dayClick: function(date, jsEvent, view){
                    console.log($(this));
                    var date= $(this).attr('data-date'); console.log(date);
                    console.log(view.name);
                    $.ajax({
                        url:'',
                        type:'post',
                        async:true,
                        data:{},
                        success: function(){
                            alert('提醒用户取货成功');
                        }
                    });
                }
            });
        }

        renderCal();
        
    });
</script>



</body></html>