<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/user/handleshow.html";i:1525404942;}*/ ?>

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
    
 
   
   <form action="" method="get">
   	 <ul class="prosearch">
   
	   	<li>
	   		<label>查询：</label><input name="baname" type="text" class="scinput" placeholder="经办真名"/>
	   		<input name="phone" type="text" class="scinput" placeholder="经办电话" />
	   
	   	<select name="handlecity" class="scinput" >
			<option value="">全部城市</option>
 			<option value="广州">广州</option>
		 	<option value="杭州">杭州</option>
		 	<option value="深圳">深圳</option>
		 	<option value="珠海">珠海</option>
		</select>
		
		
	   	<input name="" type="submit" class="sure" value="查询"/>
	   	
	   	</li>
	   
	   </ul>
   	
   </form>
  
   
   <div class="formtitle1"><span>立项项目</span></div>
   
    <table class="tablelist">
    	<thead>
    	<tr>
      
				<th>序号</th>
				<th>手机号</th>
				<th>称呼</th>
				<th>城市</th>
	
				<th>金币数</th>
				<th>实名认证</th>
				<th>机构认证</th>
				<th>从业经验</th>
				<th>注册时间</th>
				<th>状态</th>
				<th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>	
        <tr>
        <td><?php echo $vo['han_id']; ?></td>
        <td><?php echo $vo['phone']; ?></td>
        <td><?php echo $vo['name']; ?></td>
        <td><?php echo $vo['city']; ?></td>
     
        <td><?php echo $vo['money']; ?>八币</td>
        <td><?php echo $vo['baname']; ?></td>
        <td><?php echo $vo['city']; ?><?php echo $vo['bankname']; ?></td>
				<td><?php echo $vo['experience']; ?></td>
				<td><?php echo $vo['addtime']; ?></td>
				<td>正常</td>
        
				<td><a href="##">详情</a></td>
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

