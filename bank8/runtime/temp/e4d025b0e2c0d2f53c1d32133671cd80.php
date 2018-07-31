<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/news/show.html";i:1531471171;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资讯展示</title>
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
    <span>位置：资讯页</span>
    <ul class="placeul">
    <!-- <li><a href="#" onClick=”javascript :history.back(-1);”>返回</a></li> -->
    <!-- <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li> -->
    </ul>
    </div>

    <div class="rightinfo">

    <div class="tools">

    	<ul class="toolbar">
        <a href="add"><li class="click"><span><img src="<?php echo BACK_IMG_URL; ?>t01.png" /></span>添加</li></a>
        <li>
	   		<label></label>

         <form action="" method="get">


				<input name="headline" type="text" class="scinput" placeholder="标题"/>&nbsp;&nbsp;&nbsp;
            <input placeholder="请输入开始日期" name="time1" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
						~<input placeholder="请输入结束日期" name="time2" class="laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
						<input name="" type="submit" class="sure" value="查询"/>

             </form>
             </li>

        </ul>


        <ul class="toolbar1">
        <li><span><img src="<?php echo BACK_IMG_URL; ?>t05.png" /></span>设置</li>
        </ul>

    </div>


    <table class="tablelist" style="table-layout: fixed;width: 100 px">
    	<thead>
    	  <tr>

        <th>编号</th>
        <th>标题</th>
        <th>图片</th>
        <th>来源</th>
        <th>大小图</th>
        <!--<th >新闻内容</th>-->
        <th>url</th>
        <th>是否热门</th>
        <th>状态</th>
        <th>内容显示时间</th>
        <th>标签</th>
        <!-- <th>内容添加时间</th> -->
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>


        <tr >
        <!-- <?php $arr = ['未确定', '已确定', '等待买家确定收货', '交易成功', '无效订单', '退货'];?> -->
        	<?php $arr = ['1'=>'上架', '0'=>'下架'];$arrs = ['1'=>'是', '0'=>'否'];$arrd = ['1'=>'大图', '2'=>'小图','0'=>'默认'];?>


        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['journalism_id']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['headline']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['picture']; ?> </td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['source']; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $arrd[$vo['BigAndLittle']]; ?></td>

       <!-- <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['webtext']; ?> </td>-->
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['url']; ?></td>

        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $arrs[$vo['state']]; ?></td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $arr[$vo['status']]; ?></td>
        <td ><?php echo date('Y-m-d H:i:s',$vo['addtime']);?> </td>
        <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $vo['tag']; ?> </td>

        <!-- <td ><?php echo date('Y-m-d H:i:s',$vo['addtime']);?></td> -->


        <td>

            <a href="updates?id=<?php echo $vo['journalism_id']; ?>" class="tablelink"  onClick="udp()"> <?php echo $arr[$vo['status']]; ?></a>
            <a href="update?id=<?php echo $vo['journalism_id']; ?>" class="tablelink"> 编辑</a>
        	<a href="delete?id=<?php echo $vo['journalism_id']; ?>" class="tablelink" onClick="delcfm()" > 删除</a>

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
