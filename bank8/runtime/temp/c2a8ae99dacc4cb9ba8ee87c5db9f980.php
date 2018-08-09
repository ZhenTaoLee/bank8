<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/user/show.html";i:1530149287;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->

<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">项目申报</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
 
   
   <form action="/index.php/back/user/show" method="get">
   	 <ul class="prosearch">
   
	   	<li><label>查询：</label><i>注册手机号</i><a><input name="phone" type="text" class="scinput" /></a><!--<i>项目编号</i><a><input name="" type="text" class="scinput" /></a>--><a><input name="" type="submit" class="sure" value="查询"/></a></li>
	   
	   </ul>
   	
   </form>
  
   
   <div class="formtitle1"><span>立项项目</span></div>
   
    <table class="tablelist">
    	<thead>
    	<tr>
     		<th>Id</th>
        <th>手机号</th>
        <th>昵称(注册人数：<?php echo $usercount; ?>)</th>
        <th>注册时间</th>
        <th>是否是经办</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>	
        <tr>
        <td><?php echo $vo['user_id']; ?></td>
        <td><?php echo $vo['phone']; ?></td>
        <td><?php echo $vo['nickname']; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$vo['regtime']);?></td>
        <td><?php if($vo['type']==2){echo "经办";}else{ echo "普通用户";} ?></td>
  
        <td><?php if($vo['type']==1){?><a href="handleadd?id=<?php echo $vo['user_id']; ?>" class="tablelink">升级为经办账号</a><?php }?></td>
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
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>