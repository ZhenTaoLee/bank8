<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/pay/pay.html";i:1527561938;}*/ ?>
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
 	
			        <li><input name="baname" type="text" class="scinput" placeholder="姓名（经办）" /><label></label><input name="payodd" type="text" class="scinput" placeholder="单号" /><input name="patternodd" type="text" class="scinput" placeholder="支付单号" />
			              <input placeholder="请输入开始日期" name="time1" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
			              ~<input placeholder="请输入结束日期" name="time2" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
                <div class="vocation">
                <select class="scinput" name="consume">
                	<option value="">全部状态</option>
                	<option value="1">消费</option>
                	<option value="2">提现</option>
                	<option value="3">完成订单奖励</option>
                	<option value="0">充值</option>
                </select>
  
                <select class="scinput" name="patte">
                	<option value="">全部支付方式</option>
                	<option value="1">支付宝</option>
                	<option value="2">微信支付</option>
                	<option value="3">余额</option>
                </select>
                <select class="scinput" name="city">
                	<option value="">全部城市</option>
                	<option value="广州">广州</option>
                	<option value="深圳">深圳</option>
              
                </select>
                </div>
            </li>

            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
      </form>
      
       <form action="paydaochu" method="get">
 	
			        <input name="baname" type="hidden" class="scinput" placeholder="姓名（经办）" value="<?php echo input('get.baname'); ?>"  />
			        <input name="payodd" type="hidden" class="scinput" placeholder="单号" value="<?php echo input('get.payodd'); ?>"  />
			        <input name="patternodd" type="hidden" class="scinput" placeholder="支付单号" value="<?php echo input('get.patternodd'); ?>"  />
 <input type="hidden" name="consume" id="consume" value="<?php echo input('get.consume'); ?>" />
  <input type="hidden" name="time1" id="time1" value="<?php echo input('get.time1'); ?>" />
   <input type="hidden" name="time2" id="time2" value="<?php echo input('get.time2'); ?>" />
                <input type="hidden" name="patte" id="patte" value="<?php echo input('get.patte'); ?>" />
                <input type="hidden" name="city" id="city" value="<?php echo input('get.city'); ?>" />

            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="导出"/></li>
      </form>
        </ul>


        

    </div>


    <table class="tablelist" style="table-layout: fixed;width: 100 px">
    	<thead>
    	   <tr>

        <th>编号</th>
        <th>用户昵称</th>
        <th>用户</th>
        <th>城市</th>
        <th width="150">单号</th>
        <th>支付方式</th>
        <th width="250">支付单号</th>
        <th>金额</th>
        <th>状态</th>
        <th>说明</th>
        <th>支付时间</th>

   
        </tr>
        </thead>
        <tbody>
    
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

        <tr>
        <td><?php echo $vo['pay_id']; ?></td>
        <td><?php echo $vo['nickname']; ?></td>
        <td><?php echo $vo['baname']; ?></td>
        <td><?php echo $vo['city']; ?></td>
        <td><?php echo $vo['payodd']; ?></td>
        
        <td>
        	<?php if($vo['patte']==1){ echo '支付宝';}elseif($vo['patte']==2){ echo '微信支付';}else{ echo '余额';} ?></td>
        
        <td><?php echo $vo['patternodd']; ?></td>
        <td>¥<?php echo $vo['money']; ?></td>
        <td><?php if($vo['consume']==1){ echo '消费';}elseif($vo['consume']==2){ echo '提现';}elseif($vo['consume']==3){ echo '完成订单奖励';}else{ echo '充值';} ?></td>
        <td><?php echo $vo['explain']; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$vo['paytime']);?></td>
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
