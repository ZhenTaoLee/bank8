<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/order/show.html";i:1528356278;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单管理</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BACK_CSS_URL; ?>select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>select-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>editor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->
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
<style type="text/css">
    .tabson ul li{margin-right: 50px;}
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
    <div class="formbody">

<!--       <div id="tab1" class="tabson">   
        <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div>   
    </div>  -->
  <form action="" method="get">
  	
  
    
  	<div id="tab2" class="tabson">   
        <ul class="seachform" >
            <li>
                <div class="vocation">
                <select class="select3" name="city">
                <option value="" >全部城市</option>
                <option value="广州" >广州</option>
                <option value="杭州" >杭州</option>
                <option value="深圳" >深圳</option>
                <option value="珠海" >珠海</option>
                </select>
                </div>
                <div class="vocation">
                <select class="select3" name="orderType">
                <option value="" >订单状态</option>
                <option value="待接单" >待接单</option>
                <option value="待沟通" >待沟通</option>
                <option value="开始受理" >开始受理</option>
                <option value="准备资料" >准备资料</option>
                <option value="待签约" >待签约</option>
                <option value="审核中" >审核中</option>
                <option value="待放款" >待放款</option>
               	<option value="已放款" >已放款</option>
                <option value="订单转移" >订单转移</option>
                <option value="已完成" >已完成</option>
                <option value="订单失败" >订单失败</option>
                </select>
                </div>
           <input name="orderNumber" type="text" class="scinput" placeholder="订单编号" />
           <input name="uphone" type="text" class="scinput" placeholder="客户手机号" />
            </li>
            <li><label>下单时间：</label>  
            <input placeholder="请输入开始日期" name="time1" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
			              ~<input placeholder="请输入结束日期" name="time2" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
            </li>           
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
        
        </ul>
  </form>  
    
    <table class="tablelist">
    	<thead>
        	<tr>
            <!-- <th><input name="" type="checkbox" value="" checked="checked"/></th> -->
            <th>序号<!-- <i class="sort"><img src="images/px.gif" /></i> --></th>
            <th>订单编号</th>
            <th>城市</th>
            <th>手机号</th>
            <th>姓名</th>
            <th>经办</th>
            <th>经办电话</th>
            <th>产品名字</th>
            <th>服务费</th>
            <th>下单时间</th>
            <th>订单状态</th>
            <th>更新时间</th>
            <th width="300">备注</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
       <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>	
        <tr>
            <!-- <td><input name="" type="checkbox" value="" /></td> -->
            <td><?php echo $vo['order_id']; ?></td>
            <td><?php echo $vo['orderNumber']; ?></td>
            <td><?php echo $vo['city']; ?></td>
            <td><?php echo $vo['uphone']; ?></td>
            <td><?php echo $vo['name']; ?></td>
            <td><?php echo $vo['bankname']; ?><?php echo $vo['baname']; ?></td>  
            <td><?php echo $vo['phone']; ?></td>          
            <td><?php echo $vo['goodName']; ?></td>
            <td><?php if($vo['pay_Numbers']!=0){ echo "已支付";}else{echo "未支付";}?></td>
            <td><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td>
            <td><?php echo $vo['orderType']; ?></td>
            <td ><?php 
					
					if($vo['updtime']!=0){
						echo date('Y-m-d H:i:s',$vo['updtime']);
					}
					?> </td>
				<td>
				<form action="updremark" method="post">
						<input type="hidden" name="id" id="" value="<?php echo $vo['order_id']; ?>" />
						<textarea cols="30" rows="5" name="remark"><?php echo $vo['remark']; ?></textarea>
			
						<input type="submit" value="更新" class="" style="color: #FFFFFF;width: 50px; height: 20px; background-color: red;" /></form>
						</td>
            <td><a href="details?id=<?php echo $vo['matching_id']; ?>" class="tablelink">匹配项</a>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<?php if($vo['orderType']!='订单失败' && $vo['orderType']!='已完成' ){?>
            	<a href="fly?id=<?php echo $vo['order_id']; ?>"  class="tablelink" onClick="delcfm()">断单</a>&nbsp;&nbsp;&nbsp;
            	<?php } if($vo['city']=='广州' && $vo['orderType']!='已完成'){?>	
			<a href="gows?oid=<?php echo $vo['order_id']; ?>" class="tablelink">重新分配</a>
				<?php } ?>
            </td>	
        </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?> 
       
        </tbody>
    </table>
 
    </div>
	</div> 
     <div class="page">
	<table style="margin:0 auto;text-align: center;">
		<tr>
			<?php echo $list->render(); ?>
		</tr>
	</table>

    </div>
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>   
    <script type="text/javascript">
    	 function delcfm() {
        if (!confirm("确认要断单？")) {
            window.event.returnValue = false;
        }
    }
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    </div>


</body>

</html>
