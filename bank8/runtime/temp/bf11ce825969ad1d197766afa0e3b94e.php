<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/good/bank.html";i:1525916728;}*/ ?>
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
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    <form action="" method="get">
    	<ul class="toolbar">
    		
       <a href="bankadd"><li class="click"><span><img src="<?php echo BACK_IMG_URL; ?>t01.png" /></span>添加</li></a>
  
   	<li>
	   		<label>查询：</label><input name="bankname" type="text" class="scinput" placeholder="机构名称"/>
	   	<select name="city" class="scinput" >
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

   	
  
        
        
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>

        <th>编号<i class="sort"><img src="<?php echo BACK_IMG_URL; ?>px.gif" /></i></th>
        <th>机构名称</th>
        <th>logo</th>
        <th>合作开始时间</th>
        <th>城市</th>
        <th>合作状态</th>        
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			
			    
        <tr>
       
        <td><?php echo $vo['b_id']; ?></td>
        <td><?php echo $vo['bankname']; ?></td>
        <td>
        <img src="<?php echo $vo['logo']; ?>" style="width: 70px;"/>
        </td>
        <td><?php echo date('Y-m-d H:i:s',$vo['addtime'])?></td>
        <td><?php echo $vo['city']; ?></td>
        <td>正常</td>
        <td>
        		<a href="bupd?id=<?php echo $vo['b_id']; ?>" class="tablelink">编辑</a>
        		<a href="bankdelete?id=<?php echo $vo['b_id']; ?>" class="tablelink">删除</a>
        		
        </td>
        
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
