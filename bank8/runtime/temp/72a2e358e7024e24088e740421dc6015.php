<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/admin/show.html";i:1525248996;}*/ ?>
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
    
    	<ul class="toolbar">
        <a href="add"><li class="click"><span><img src="<?php echo BACK_IMG_URL; ?>t01.png" /></span>添加</li></a>
  
        </ul>
        
        
        <ul class="toolbar1">
        <li><span><img src="<?php echo BACK_IMG_URL; ?>t05.png" /></span>设置</li>
        </ul>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
       
        <th>编号</th>
        <th>账号</th>      
        <th>昵称</th>
        <th>职位</th>
        <th>上次登录ip</th>
        <th>上次登录时间</th>        
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			
			    
        <tr>
       
        <td><?php echo $vo['admin_id']; ?></td>
        <td><?php echo $vo['name']; ?></td>
        <td><?php echo $vo['nickname']; ?> </td>
        <td><?php echo $vo['qianxian']; ?> </td>
        <td><?php echo $vo['ip']; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>
   

        <td>
        	<!--<a href="upd?id=<?php echo $vo['admin_id']; ?>" class="tablelink"> 编辑·</a>-->
        	<a href="delete?id=<?php echo $vo['admin_id']; ?>" class="tablelink" onClick="delcfm()"> 删除</a>
         
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
    	 function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>
