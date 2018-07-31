<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/extend/show.html";i:1530501912;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>表单数据统计</title>
<link rel="icon" href="<?php echo BACK_IMG_URL; ?>web/icon.png" type="image/jpeg"/>

<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>
<link href="<?php echo BACK_CSS_URL; ?>css.css" rel="stylesheet"><!--分页样式-->
<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>laydate/laydate.js"></script>



<style>
.divcss5{ width:300px; height:50px; line-height:25px; overflow:hidden}
/* 设置对象高度宽度，同时设置overflow:hidden */
</style>



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
    <!-- <li><a href="#"><b>表单数据统计</b></a></li> -->
    <li><a href="/index/Extend/show"><b>所有类型贷推广页统计</b></a></li>
    <li><a href="/index/Carex/carshow"><b>车贷推广页统计</b></a></li>
    <li><a href="/index/Carex/workshow"><b>工薪贷表单数据统计</b></a></li>
    <li><a href="/index/Carex/policyshow"><b>保单贷表单数据统计</b></a></li>

    <!-- <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li> -->
    </ul>
    </div>

    <div class="rightinfo">

    <div class="tools">

    	<ul class="toolbar">

        <li>

           <select onchange="window.location=this.value" class="scinput" >
            <option value="">请选择</option>

            <option value="/index/extend/show">填表单数据</option>

            <option value="/index/extend/showclick">下载量数据</option>

          </select>
        </li>
        <li>
	   		<label></label>


         <form action="" method="get">


            <select name="city" class="scinput" >
      			<option value="">全部城市</option>
       			<option value="广州">广州</option>
      		 	<option value="杭州">杭州</option>
      		 	<option value="深圳">深圳</option>
      		 	<option value="珠海">珠海</option>
      		  </select>
            <select name="source" class="scinput" >
            <option value="">全部平台</option>
            <option value="UC">UC</option>
            <option value="凤凰网">凤凰网</option>
            <option value="头条">头条</option>
            <option value="珠海">新浪</option>
            </select>
            <!-- <input name="city" type="text" class="scinput" placeholder="城市"/>&nbsp;&nbsp;&nbsp; -->
            <input placeholder="请输入开始日期" name="time1" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
						~<input placeholder="请输入结束日期" name="time2" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
						<input name="" type="submit" class="sure" value="查询"/>
          </form>
   </li>
          <li>

          <form action="daochu" method="get">

          <input type="hidden" name="city" id="city" value="<?php echo input('get.city'); ?>" />
          <input type="hidden" name="source" id="source" value="<?php echo input('get.source'); ?>" />
   			 	<input type="hidden" name="name" id="source" value="<?php echo input('get.source'); ?>" />
			    <input type="hidden" name="time1" id="time1" value="<?php echo input('get.time1'); ?>" />
			    <input type="hidden" name="time2" id="time2" value="<?php echo input('get.time2'); ?>" />


          </form>
          </li>

            <ul class="toolbar1">
              <li><span></span>表单新浪数据汇总：</li>
              <li><span></span><?php echo $sina; ?></li>
              <!-- <a href="/index/extend/showclick"><li><span></span><b>详情</b></li></a> -->
            </ul>

            <ul class="toolbar1">
              <li><span></span>表单凤凰网数据汇总：</li>
              <li><span></span><?php echo $fh; ?></li>
            </ul>
            <ul class="toolbar1">
              <li><span></span>表单UC数据汇总：</li>
              <li><span></span><?php echo $uc; ?></li>
            </ul>
            <ul class="toolbar1">
              <li><span></span>表单头条数据汇总：</li>
              <li><span></span><?php echo $toutiao; ?></li>
            </ul>


        </ul>





    </div>
    <!-- 表单数据统计 -->
    <div class="tools">



        <ul class="toolbar">
            <li><span></span>表单凤凰数据今日统计：</li>
            <li><span></span><?php echo $fhret; ?></li>
        </ul>

        <ul class="toolbar">
            <li><span></span>表单UC数据今日统计：</li>
            <li><span></span><?php echo $ucret; ?></li>
        </ul>
        <ul class="toolbar">
            <li><span></span>表单新浪数据今日统计：</li>
            <li><span></span><?php echo $sinaret; ?></li>
        </ul>
        <ul class="toolbar">
            <li><span></span>表单新浪数据今日统计：</li>
            <li><span></span><?php echo $toutiaoret; ?></li>
        </ul>
    </div>

    <table class="tablelist" style="table-layout: fixed;width: 100 px">
    	<thead>
    	  <tr>

        <th>编号</th>
        <th>城市</th>
        <th>姓名</th>
        <th>来源</th>
        <!-- <th>姓名</th>
        <th>电话</th> -->
        <th>申请时间</th>
        <!--<th >新闻内容</th>-->
        <!-- <th>申请类型</th> -->
        <!-- <th>状态</th>
        <th>内容显示时间</th>
        <th>标签</th> -->
        <!-- <th>内容添加时间</th> -->
        <!-- <th>操作</th> -->
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>


        <tr >
        <!-- <?php $arr = ['未确定', '已确定', '等待买家确定收货', '交易成功', '无效订单', '退货'];?> -->
        	<!-- <?php $arr = ['1'=>'上架', '0'=>'下架'];$arrs = ['1'=>'是', '0'=>'否'];$arrd = ['1'=>'大图', '2'=>'小图','0'=>'默认'];?> -->


        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['webapply_id']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['city']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['name']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['source']; ?></td>
        <td ><?php echo date('Y-m-d H:i:s',$vo['addtime']);?> </td>








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

	<script type="text/javascript">
    	 function upd() {
        if (!confirm("确认要上架？")) {
            window.event.returnValue = false;
        }
    }
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>
