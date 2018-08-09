<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/tool/cartool.html";i:1525424208;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工具管理-车评估</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BACK_CSS_URL; ?>select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>select-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>editor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345
	});
	$(".select2").uedSelect({
		width : 167
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
<style type="text/css">
    .tabson ul li{margin-right: 50px;}
</style>
</head>

<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
        </ul>
    </div>
    <div class="formbody">

<!--       <div id="tab1" class="tabson">
        <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div>
    </div>  -->


  	<div id="tab2" class="tabson">
  		 <form action="" method="get">
        <ul class="seachform">
            <li><label>手机号</label><input name="phone" type="text" class="scinput" /></li>
            <li><label>品牌</label><input name="brand" type="text" class="scinput" /></li>
            <li><label>时间：</label>
            <input placeholder="请输入开始日期" name="time1" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
						~<input placeholder="请输入结束日期" name="time2" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
            </li>
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
        </ul>
 </form>

    <table class="tablelist">
    	<thead>
    	<tr>
        <!-- <th><input name="" type="checkbox" value="" checked="checked"/></th> -->
        <th>序号<!-- <i class="sort"><img src="images/px.gif" /></i> --></th>
        <th>手机号</th>
        <th width="200px">汽车(品牌+车系+车型)</th>
        <th>上牌地区</th>
        <th>启动时间</th>
        <th>车况</th>
        <th>车辆用途</th>
        <th>行驶公里</th>
        <th>购买价/万</th>
        <th>二手车行收购</th>
        <th>个人交易价</th>
        <th>二手车商行售价</th>
        <th>评估时间</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <!-- <td><input name="" type="checkbox" value="" /></td> -->
				<?php $arr = ['1'=>'优秀', '2'=>'一般', '3'=>'较差'];$ass = ['1'=>'自用', '2'=>'公务商用', '3'=>'营运'];if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?>
        <td><?php echo $res['vehicle_id']; ?></td>
        <td><?php echo $res['phone']; ?></td>
        <td><?php echo $res['brand']; ?> &nbsp; <?php echo $res['series']; ?> &nbsp; <?php echo $res['model']; ?></td>
        <td><?php echo $res['site']; ?></td>
        <td><?php echo $res['starttime']; ?></td>
        <td><?php echo $arr[$res['condition']]; ?></td>
        <td><?php echo $ass[$res['purpose']]; ?></td>
        <td><?php echo $res['mileage']; ?></td>
        <td><?php echo $res['price']; ?>万</td>
        <td><?php echo $res['purchase']; ?>万</td>
        <td><?php echo $res['bargainprice']; ?>万</td>
        <td><?php echo $res['sellingprice']; ?>万</td>
        <td><?php echo date('Y-m-d H:i:s',$res['addtime']);?></td>
        </tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
<div class="page">
	<table style="margin:0 auto;text-align: center;">
		<tr>
			<?php echo $list->render(); ?>
		</tr>
	</table>
</div>
    </div>

	</div>

	<script type="text/javascript">
      $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

    </div>


</body>

</html>
