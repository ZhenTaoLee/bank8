<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/pay/withdraw.html";i:1531792430;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提现</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
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
  <ul class="seachform">
 <form action="" method="get">
 	
			        <li><input name="baname" type="text" class="scinput" placeholder="姓名（经办）" />
			              <input placeholder="请输入开始日期" name="time1" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
			              ~<input placeholder="请输入结束日期" name="time2" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
                <div class="vocation">
                <select class="scinput" name="type" >
                	<option value="">全部状态</option>
                	<option value="1">已提现</option>
                	<option value="2">已驳回</option>
                	<option value="0">处理中</option>
                </select>
  
      
                
                </div>
            </li>

            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
      </form>
        </ul>

    </div>


    <table class="tablelist" style="table-layout: fixed;width: 100 px">
    	<thead>
    	   <tr>

        <th>编号</th>
        <th>经理人|机构</th>
        <th>退款金额</th>
        <th>状态</th>
        <th>时间</th>

        <th>操作</th>
        </tr>
        </thead>
        <tbody>
    
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

        <tr>
        <td><?php echo $vo['withdraw_id']; ?></td>
        <td><?php echo $vo['baname']; ?>|<?php echo $vo['bankname']; ?></td>
        <td><?php echo $vo['deposit']; ?></td>
         <td>
			<?php if($vo['type']==0){?>
			          处理中
			<?php }elseif($vo['type']==1){ ?>
				已提现
			<?php }elseif($vo['type']==2){ ?>
				已驳回
			<?php } ?>
		</td>
        <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>
       

        <td>
			<?php if($vo['type']==0){?>
			           <a href="approve?id=<?php echo $vo['withdraw_id']; ?>&as=1" class="tablelink">通过</a> 
			           <a href="approve?id=<?php echo $vo['withdraw_id']; ?>&as=2" class="tablelink">驳回</a>
			<?php }elseif($vo['type']==1){ ?>
				已提醒
			<?php }elseif($vo['type']==2){ ?>
				已驳回
			<?php } ?>
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
