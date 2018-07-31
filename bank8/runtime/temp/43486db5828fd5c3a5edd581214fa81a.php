<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/tool/roomtoolshow.html";i:1531814929;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工具管理-房评估</title>
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
       /**/h : './index.css'
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
    #box
    {
        margin: 0 auto;
        display:none;
        border:1em solid #3366FF;
        /* height:30%;
         width:50%;  */
        position:absolute;/*让节点脱离文档流,我的理解就是,从页面上浮出来,不再按照文档其它内容布局*/
       top:40%;/*  节点脱离了文档流,如果设置位置需要用top和left,right,bottom定位     */
       left:40%;
        z-index:2;/*个人理解为层级关系,由于这个节点要在顶部显示,所以这个值比其余节点的都大*/
        background: white;


    }
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

    <!--<div id="tab1" class="tabson">
        <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div>
    </div>  -->


  	<div id="tab2" class="tabson">
        <ul class="seachform">
 <form action="" method="get">
        <li><input name="phone" type="text" class="scinput" placeholder="手机号" /><label></label><input name="city" type="text" class="scinput" placeholder="房产城市" /><input name="building" type="text" class="scinput" placeholder="楼盘名称" />
              <input placeholder="请输入开始日期" name="time1" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
              ~<input placeholder="请输入结束日期" name="time2" class="scinput laydate-icon timeUstyle stateUTime" onclick="laydate({istime: true,format:'YYYY-MM-DD hh:mm'})">
            </li>

            <li><label>状态</label>
                <div class="vocation">
                <select class="select3" name="status">
                	<option value="">全部</option>
                	<option value="0">处理中</option>
                	<option value="1">已回复</option>
                </select>
                </div>
            </li>

            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="搜索"/></li>
      </form>
        </ul>


        <table class="tablelist">
        	<thead>
        	<tr>
            <!-- <th><input name="" type="checkbox" value="" checked="checked"/></th> -->
            <th>序号<!-- <i class="sort"><img src="images/px.gif" /></i> --></th>
            <th>手机号</th>
            <th>姓名</th>
            <th>房产城市</th>
            <th>楼盘名称</th>
            <th>详细地址</th>
            <th>楼栋</th>
            <th>层/室</th>
            <th>面积/平</th>
            <th>单价(元/平)</th>
            <th>总价(万元)</th>
            <th>评估时间</th>
            <th>状态</th>
            <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php $arr = ['0'=>'处理中','1'=>'已回复'];if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?>
            <input type="hidden" name="house_id" id="house_id" value="<?php echo $res['house_id']; ?>" />

            <!-- <td><input name="" type="checkbox" value="" /></td> -->
            <td><?php echo $res['house_id']; ?></td>
            <td><?php echo $res['phone']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['city']; ?></td>
            <td><?php echo $res['building']; ?></td>
            <td><?php echo $res['site']; ?></td>
            <td><?php echo $res['seat']; ?></td>
            <td><?php echo $res['floor']; ?></td>
            <td><?php echo $res['area']; ?></td>
            <td><?php echo $res['price']; ?></td>
            <td><?php echo $res['total']; ?></td>
            <td><?php echo date('Y-m-d H:i:s',$res['addtime']);?></td>
            <td><?php echo $arr[$res['status']]; ?></td>
            <td>
              <?php if($res['status']==0){?>
                        <a href="javascript:show()" class="tablelink" id="a1">回复</a>
              <?php }elseif($res['status']==1){ ?>
                  已回复
              <?php }?>

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

    <div id="box" style="width: 380px; height: 200px; border: 1px solid rgb(237,92,20) ; text-align: center;">
     <a href="javascript:hide()">关闭</a>
    <div>
       <form action="sendmsg" method="post" id="selector">
        <p style="font-size: 16px; line-height: 40px;">在房产评估app查询后回复用户</p>
        <p style="font-size: 12px; line-height: 30px;">确认手机号：<input name="phone" type="text" class="scinput" /></p>
        <p style="font-size: 16px; line-height: 40px;">单价：<input name="price" type="text" class="scinput" />万元</p>
        <p style="margin-top: 20px;"><input name="" type="button" class="scbtn" value="取消"/>
        <input name=""  type="submit" class="scbtn" value="确定"/></p>
      </form>
    </div>
    </div>
    <div class="over"></div>

	</div>

	<!-- <script type="text/javascript">
          $("#usual1 ul").idTabs();
        </script>

        <script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>    -->

    </div>

<script type="text/javascript">
  var box = document.getElementById('box');
  var over = document.getElementById('over');
      function show()
      {
          box.style.display = "block";
          over.style.display = "block";
      }
      function hide()
      {
          box.style.display = "none";
          over.style.display = "none";
      }
</script>
</body>
</html>
