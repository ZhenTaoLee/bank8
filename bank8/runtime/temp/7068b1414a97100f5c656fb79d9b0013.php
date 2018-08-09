<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/order/gow.html";i:1529568310;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BACK_CSS_URL; ?>select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>select-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>editor/kindeditor.js"></script>

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

<style>
    p{line-height: 35px;}
    .text p{font-size: 16px;}
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
    <form action="" method="post">
    	
    <input type="hidden" name="oid" id="oid" value="<?php echo $_GET['oid']; ?>" />
    <div style="margin:0 auto; width: 600px; margin-top: 100px;">
        <p style="font-size: 20px;">请选择分配人员跟进：</p>
        <div class="text" style="padding-left: 20px;">
        	       <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>	
            <p><input name="hid"  type="radio" value="<?php echo $vo['han_id']; ?>" /><?php echo $vo['bankname']; ?>-<?php echo $vo['baname']; ?>，<?php echo $vo['phone']; ?>，当前跟进订单数<?php echo $vo['ordercount']; ?>，完成订单数<?php echo $vo['ordercounts']; ?></p>
             <?php endforeach; endif; else: echo "" ;endif; ?> 
       
            <input name="" type="submit" class="scbtn" value="确定"  />
            <input style="padding: 5px 10px 5px 10px; color: #F0F0EE; background-color: #DC4E00;margin-left: 200px;" type='button' name='Submit' onclick='javascript:history.back(-1);' value='返回'>
        </div>
    </div>
</form>
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>   

</body>

</html>
