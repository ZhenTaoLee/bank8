<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/index/inde.html";i:1527660409;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<style>
.wrapper {
	width:1200px;
	height:300px;
	padding:20px;

}
</style>
<script src="<?php echo BACK_JS_URL; ?>jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="<?php echo BACK_JS_URL; ?>jquery.jqChart.min.js" type="text/javascript"></script>

</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    
    <div class="welinfo" style="height: 100px;">
    <span><img src="<?php echo BACK_IMG_URL; ?>sun.png" alt="天气" /></span>
    <b><?php echo $name; ?>早上好，欢迎使用信息管理系统</b>
    <table border="" cellspacing="" cellpadding="" style=" width: 300px;">
    	<tr><th>昨日新增注册</th><th>昨日新增订单</th><th>昨日新增收入</th></tr>
    	<tr align="center"><td><?php echo $userc; ?></td><td><?php echo $orderc; ?></td><td><?php echo $payc; ?></td></tr>
    </table>
    </div>
    
    <input type="hidden" name="" id="a" value="" />
    
    <div class="xline"></div>
    
<div class="wrapper">


    <div id="jqChart" style="width:1000px;height:300px;"></div>


</div>
    
   
    
    <div class="xline"></div>
    <div class="box"></div>
    <div class="wrapper">


    <div id="jqChart1" style="width:1000px;height:300px;"></div>


</div>
    <div class="welinfo">
    
    </div>
    
    
    
    <div class="xline"></div>
    
   
    
    
    </div>
    
    

<script lang="javascript" type="text/javascript">
$(document).ready(function () {
	
	
	$('#jqChart').jqChart({
		title: { text: '最近七天' },
		axes: [
			{
				location: 'left',//y轴位置，取值：left,right
				minimum: 0,//y轴刻度最小值
				maximum: 50,//y轴刻度最大值
				interval: 5//刻度间距
			}
		],
		
		series: [
			//数据1开始
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:'新增人数',//标题
				data: [<?php if(is_array($usercot) || $usercot instanceof \think\Collection || $usercot instanceof \think\Paginator): $i = 0; $__LIST__ = $usercot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>['<?php echo $vo['regtime']; ?>', <?php echo $vo['ss']; ?>],<?php endforeach; endif; else: echo "" ;endif; ?>]//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			},
			//数据1结束
			//数据2开始
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:'新增单数',//标题
				data: [<?php if(is_array($ordercot) || $ordercot instanceof \think\Collection || $ordercot instanceof \think\Paginator): $i = 0; $__LIST__ = $ordercot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>['<?php echo $vo['addtime']; ?>', <?php echo $vo['ss']; ?>],<?php endforeach; endif; else: echo "" ;endif; ?>]//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			},
			//数据1结束
					
		]
	});
	$('#jqChart1').jqChart({
		title: { text: '最近30天' },
		axes: [
			{
				location: 'left',//y轴位置，取值：left,right
				minimum: 0,//y轴刻度最小值
				maximum: 50,//y轴刻度最大值
				interval: 5//刻度间距
			}
		],
		series: [
			//数据1开始
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:'新增人数',//标题
				data: [<?php if(is_array($usercotf) || $usercotf instanceof \think\Collection || $usercotf instanceof \think\Paginator): $i = 0; $__LIST__ = $usercotf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>['<?php echo $vo['regtime']; ?>', <?php echo $vo['ss']; ?>],<?php endforeach; endif; else: echo "" ;endif; ?>]//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			},
			//数据1结束
			//数据2
			{
				type: 'line',
				title:'新增单数',
				data: [<?php if(is_array($ordercotf) || $ordercotf instanceof \think\Collection || $ordercotf instanceof \think\Paginator): $i = 0; $__LIST__ = $ordercotf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>['<?php echo $vo['addtime']; ?>', <?php echo $vo['ss']; ?>],<?php endforeach; endif; else: echo "" ;endif; ?>]
			},
			//数据2结束
					
		]
	});
	
	
});
</script>
</body>

</html>