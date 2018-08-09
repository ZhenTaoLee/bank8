<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/common/ershowdd.html";i:1533797792;}*/ ?>
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
    		

        </ul>
        
        
        <ul class="toolbar1">
        <li><span><img src="<?php echo BACK_IMG_URL; ?>t05.png" /></span>设置</li>
        </ul>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
       
        <th>编号</th>
        <th>版本号</th>      
        <th>状态</th>
        <th>是否强更1为强更0为否</th>
        <th>苹果下载地址</th>
        <th>苹果描述</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			
			    
        <tr>
       
        <td><?php echo $vo['id']; ?></td>
        <td><?php echo $vo['iosversion']; ?></td>
        <td><?php if($vo['switchover']==0){echo '马甲';}else{echo '正常';} ?> </td>
        <td><?php if($vo['iosrape']==0){echo '非强更';}else{echo '强更';} ?></td>
        <td><?php echo $vo['iosurl']; ?></td>
        <td><?php echo $vo['iosdescribe']; ?></td>
        <td>
        	<?php if($vo['switchover']==0){ ?>
        	<a href="erupddd?id=<?php echo $vo['id']; ?>&ss=1" class="tablelink">变为正常</a>
        	<?php }else{ ?>
 					<a href="erupddd?id=<?php echo $vo['id']; ?>&ss=0" class="tablelink">变为审核</a>
 					<?php } ?>
 						&nbsp;&nbsp;&nbsp;
 						
 					<?php if($vo['iosrape']==0){ ?>
        	<a href="erupdsdd?id=<?php echo $vo['id']; ?>&ss=1" class="tablelink">变为强更</a>
        	<?php }else{ ?>
 					<a href="erupdsdd?id=<?php echo $vo['id']; ?>&ss=0" class="tablelink">变为非强更</a>
 					<?php } ?>
        </td>
        
        </tr> 
         <?php endforeach; endif; else: echo "" ;endif; ?> 
          <tr>
		       <td>隔开</td>
		       <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
        </tr> 
			   <form action="/index.php/back/common/eradddd/" method="post">      
        <tr>
       
        <td>id</td>
        <td><input name="iosversion" type="text" class="scinput" /></td>
        <td><select class="select3" name="switchover">
                <option value="0" >二维码马甲</option>
                <option value="1" >正常</option>
               </select></td>
        <td><select class="select3" name="iosrape">
                <option value="0" >非强更</option>
                <option value="1" >强更</option>
               </select></td>
        <td><input name="iosurl" type="text" class="scinput" /></td>
        <td><input name="iosdescribe" type="text" class="scinput" /></td>
        <td>
        	<input name="" type="submit" class="scbtn" value="添加"/>
        </td>
        
        </tr> 
        </form> 
        
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
