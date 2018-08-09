<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/service/gkshows.html";i:1529487208;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
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
  	
  
    
  	<div id="tab2" class="tabson">   
        <ul class="seachform" >
            <li>
                
               <!--<input type="checkbox" name="star1" id="" value="房" />房
               <input type="checkbox" name="star2" id="" value="车" />车
               <input type="checkbox" name="star3" id="" value="保单" />保单
               <input type="checkbox" name="star4" id="" value="工薪" />工薪
               <input type="checkbox" name="star5" id="" value="其它" />其它-->
               <select name="star"style="border: solid 1px #c3ab7d; height: 30px;" >
                	<option value="">全部星级</option>
			        		<option value="房">房</option>
			        		<option value="车">车</option>
			        		<option value="保单">保单</option>
			        		<option value="工薪">工薪</option>
			        		<option value="其它">其它</option>
			        	</select>
			        	
              
                <select name="rank"style="border: solid 1px #c3ab7d; height: 30px;" >
                	<option value="">全部级别</option>
			        		<option value="1~3天">1~3天</option>
			        		<option value="3~6天">3~6天</option>
			        		<option value="6~15天">6~15天</option>
			        		<option value="15~30天">15~30天</option>
			        		<option value="30天以上">30天以上</option>
			        	</select>
               
           <input name="name" type="text" class="scinput" placeholder="客户姓名" />
           <input name="phone" type="text" class="scinput" placeholder="客户手机号" />
           <input name="remark" type="text" class="scinput" placeholder="备注" />
            </li>
                     
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
             </form> 
            
    
        </ul>

  
  
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
       
        <th>客户名</th>
        <th>电话</th>      
        <th>贷款（万）</th>

        <th>级别</th>
        <th>星级</th>  
        <th width="200">备注</th>    
        <th>操作人</th>
        <th>时间</th>    
        <th>最新跟进</th>    
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <form action="upds" method="post">
        		<input type="hidden" name="id" id="id" value="<?php echo $vo['f_service_id']; ?>" />    		
        <tr>
        <td><?php echo $vo['name']; ?></td>
        <td><?php echo $vo['phone']; ?></td>
        <td><?php echo $vo['loans']; ?></td>
        <td><?php echo $vo['rank']; ?></td>
        <td><?php echo $vo['star']; ?></td>
        <td><?php echo $vo['remark']; ?></td>
        <td><?php echo $vo['operator']; ?> </td>
        <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>
  			<td><?php echo date('Y-m-d H:i:s',$vo['updtime']);?></td>
        <td>
        	<input type="hidden" name="operator" id="" value="<?php echo $nickname; ?>"/>
        	
        	<input type="submit" value="获取" style=" padding: 5px 10px 5px 10px; background: red; color: #FFFFFF;"/>
        	
     
        </td>   
        </tr> 
        	</form>
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
