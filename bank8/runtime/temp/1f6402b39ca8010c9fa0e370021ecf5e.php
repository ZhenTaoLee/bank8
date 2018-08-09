<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/matching/matchshow.html";i:1528267307;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>匹配管理</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BACK_CSS_URL; ?>select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>select-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>editor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
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
  		  <ul class="seachform">
  		 <form action="" method="get">
      
            <li><label>手机号：</label><input name="phone" type="text" class="scinput" /></li>
            <li><label>姓名：</label><input name="name" type="text" class="scinput" /></li>
            <li><label>时间：</label>
            <input placeholder="请输入开始日期" name="time1" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
			              ~<input placeholder="请输入结束日期" name="time2" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
            </li>
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
        
 </form>


 <form action="matchdaochu" method="get">
    
            <input name="phone" type="hidden" value="<?php echo input('get.phone'); ?>" />
          <input name="name" type="hidden" value="<?php echo input('get.name'); ?>"  />
           
        <input name="time1" type="hidden" value="<?php echo input('get.time1'); ?>" >
		<input name="time2" type="hidden" value="<?php echo input('get.time2'); ?>" >
       
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="导出"/></li>
 </form>
 </ul>
 
 
    <table class="tablelist">
    	<thead>
    	<tr>
        <!-- <th><input name="" type="checkbox" value="" checked="checked"/></th> -->
        <th>序号<!-- <i class="sort"><img src="images/px.gif" /></i> --></th>
        <th>手机号</th>
        <th>姓名</th>
        <th>推荐产品</th>
		<th>城市</th>
    	<th>匹配项</th>
        <th>匹配时间</th>
        <th>更新时间</th>
        <th>备注</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>

        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <!-- <td><input name="" type="checkbox" value="" /></td> -->

          <td><?php echo $vo['matching_id']; ?></td>
         
          <td><?php echo $vo['phone']; ?></td>
          <td><?php echo $vo['name']; ?></td>
          <td><?php echo $vo['goodName']; ?></td>
		<td><?php echo $vo['city']; ?></td>
		<td><?php if($vo['ownHouse']==1){ echo ' 拥有房产 '; } if($vo['ownAutomobile']==1){ echo ' 拥有汽车 '; } if($vo['ownGuaranteeSlip']==1){ echo ' 拥有保单 '; } if($vo['ownPersonage']==1){ echo ' 个人和企业 '; } ?>
		</td>
          <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>	
          <td ><?php 
					
					if($vo['updtime']!=0){
						echo date('Y-m-d H:i:s',$vo['updtime']);
					}
					?> </td>
				<td>
				<form action="updremark" method="post">
						<input type="hidden" name="id" id="" value="<?php echo $vo['matching_id']; ?>" />
						<textarea cols="30" rows="5" name="remark"><?php echo $vo['remark']; ?></textarea>
			
						<input type="submit" value="更新" class="" style="color: #FFFFFF;width: 50px; height: 20px; background-color: red;" /></form>
						</td>
          <td><a href="details?id=<?php echo $vo['matching_id']; ?>" class="tablelink">详情</a></td>
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
