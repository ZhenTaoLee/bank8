<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/index/top.html";i:1525330929;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(<?php echo BACK_IMG_URL; ?>topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="index" target="_parent"><img src="<?php echo BACK_IMG_URL; ?>logo.png" title="系统首页" /></a>
    </div>
        
    <ul class="nav">
    <!--<li><a href="inde.html" target="rightFrame" class="selected"><img src="<?php echo BACK_IMG_URL; ?>icon01.png" title="工作台" /><h2>工作台</h2></a></li>
    <li><a href="imgtable.html" target="rightFrame"><img src="<?php echo BACK_IMG_URL; ?>icon02.png" title="模型管理" /><h2>模型管理</h2></a></li>
    <li><a href="imglist.html"  target="rightFrame"><img src="<?php echo BACK_IMG_URL; ?>icon03.png" title="模块设计" /><h2>模块设计</h2></a></li>
    <li><a href="tools.html"  target="rightFrame"><img src="<?php echo BACK_IMG_URL; ?>icon04.png" title="常用工具" /><h2>常用工具</h2></a></li>
    <li><a href="computer.html" target="rightFrame"><img src="<?php echo BACK_IMG_URL; ?>icon05.png" title="文件管理" /><h2>文件管理</h2></a></li>
    <li><a href="tab.html"  target="rightFrame"><img src="<?php echo BACK_IMG_URL; ?>icon06.png" title="系统设置" /><h2>系统设置</h2></a></li>-->
    </ul>
            
    <div class="topright">    
    <ul>
  
    <li><a href="/index.php/back/index/delete/" target="_parent">退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo \think\Session::get('nickname'); ?></span>
    
 
    </div>    
    
    </div>

</body>
</html>
