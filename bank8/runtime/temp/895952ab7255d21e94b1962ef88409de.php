<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/back/view/index/left.html";i:1533797896;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo BACK_CSS_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo BACK_JS_URL; ?>jquery.js"></script>

<script type="text/javascript">
$(function(){
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();

		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();
			}


		}
	});

	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });

	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})
</script>


</head>

<body style="background:#fff3e1;">
	<div class="lefttop"><span></span>通讯录</div>

    <dl class="leftmenu">

   <?php if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理' || $qianxian=='广州助理'|| $qianxian=='杭州助理'|| $qianxian=='深圳助理'|| $qianxian=='珠海助理'){?>
    <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico01.png" /></span>用户管理
    </div>
    	<ul class="menuson">
<?php if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理'){?>
    <li><cite></cite><a href="/index.php/back/admin/show.html" target="rightFrame">管理员管理</a><i></i></li>
<?php } ?>
    <li><cite></cite><a href="/index.php/back/user/show.html" target="rightFrame">用户管理</a><i></i></li>

     <li><cite></cite><a href="/index.php/back/user/handleshow.html" target="rightFrame">经办管理</a><i></i>

     </li>


        </ul>
    </dd>
   <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理' || $qianxian=='广州助理'|| $qianxian=='杭州助理'|| $qianxian=='深圳助理'|| $qianxian=='珠海助理'){?>
<dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>产品管理
    </div>
    <ul class="menuson">

        <li><cite></cite><a href="/index.php/back/good/bank.html" target="rightFrame">机构管理</a><i></i></li>

        <li><cite></cite><a href="/index.php/back/good/show.html" target="rightFrame">产品管理</a><i></i></li>

        </ul>
    </dd>
     <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'){?>
<dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>信息管理
    </div>
    <ul class="menuson">

        <li><cite></cite><a href="/index.php/back/news/show.html" target="rightFrame">资讯管理</a><i></i></li>
        <li><cite></cite><a href="/index.php/back/school/schoolshow.html" target="rightFrame">学堂管理</a><i></i></li>


        <li><cite></cite><a href="/index.php/back/qa/show.html" target="rightFrame">问题管理</a><i></i></li>

     	<li><cite></cite><a href="/index.php/back/Newsflash/show.html" target="rightFrame">每日快报管理</a><i></i></li>

        </ul>
    </dd>
  <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'|| $qianxian=='杭州助理'){?>
    <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>评估
    </div>
    <ul class="menuson">

        <li><cite></cite><a href="/index.php/back/Tool/cartool.html" target="rightFrame">车评估</a><i></i></li>

        <li><cite></cite><a href="/index.php/back/Tool/roomToolshow.html" target="rightFrame">房评估</a><i></i></li>



        </ul>
    </dd>
  <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理' || $qianxian=='广州助理'|| $qianxian=='杭州助理'|| $qianxian=='深圳助理'|| $qianxian=='珠海助理'){?>
       <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>订单管理
    </div>
    <ul class="menuson">

        <li><cite></cite><a href="/index.php/back/Matching/matchShow.html" target="rightFrame">匹配管理</a><i></i></li>
        <li><cite></cite><a href="/index.php/back/order/nogshow.html" target="rightFrame">重新审核</a><i></i></li>
      	<li><cite></cite><a href="/index.php/back/order/show.html" target="rightFrame">订单管理</a><i></i></li>
      	 <?php if($qianxian=='管理员' || $qianxian=='总经理'||$qianxian=='总部助理'|| $qianxian=='广州经理'|| $qianxian=='广州助理'){?>
       	<li><cite></cite><a href="/index.php/back/order/gshow.html" target="rightFrame">广州订单审核</a><i></i></li>
       	<li><cite></cite><a href="/index.php/back/order/qshow.html" target="rightFrame">其它订单审核</a><i></i></li>
       		<!--<li><cite></cite><a href="/index.php/back/order/gdshowss.html" target="rightFrame">转移订单管理</a><i></i></li>-->
       	 <?php } if($qianxian=='管理员' || $qianxian=='总经理'||$qianxian=='总部助理'|| $qianxian=='杭州经理'|| $qianxian=='杭州助理'){?>
		<li><cite></cite><a href="/index.php/back/order/hshow.html" target="rightFrame">杭州订单分配</a><i></i></li>
		<?php } if($qianxian=='管理员' || $qianxian=='总经理'||$qianxian=='总部助理'|| $qianxian=='深圳经理'|| $qianxian=='深圳助理'){?>
   		<li><cite></cite><a href="/index.php/back/order/sshow.html" target="rightFrame">深圳订单分配</a><i></i></li>
   		<?php } if($qianxian=='管理员' || $qianxian=='总经理'||$qianxian=='总部助理'|| $qianxian=='珠海经理'|| $qianxian=='珠海助理'){?>
   		<li><cite></cite><a href="/index.php/back/order/zshow.html" target="rightFrame">珠海订单分配</a><i></i></li>
   		<?php } ?>
        </ul>
    </dd>
    <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='财务经理'){?>
  <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>财务管理
    </div>
    <ul class="menuson">

        <li><cite></cite><a href="/index.php/back/pay/withdraw.html" target="rightFrame">提现管理</a><i></i></li>
 		<li><cite></cite><a href="/index.php/back/pay/pay.html" target="rightFrame">收入支出管理</a><i></i></li>

        </ul>
    </dd>
    <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理' || $qianxian=='广州助理'|| $qianxian=='杭州助理'|| $qianxian=='深圳助理'|| $qianxian=='珠海助理'){?>

    <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>网站区域管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="/index.php/back/Cityweb/show.html" target="rightFrame">区域管理</a><i></i></li>
        <li><cite></cite><a href="/index.php/back/carex/carshow.html" target="rightFrame">车贷推广数据</a><i></i></li>
				<li><cite></cite><a href="/index.php/back/Policy/policyshow.html" target="rightFrame">保单贷推广数据</a><i></i></li>
        <li><cite></cite><a href="/index.php/back/Policy/workshow.html" target="rightFrame">工薪贷推广数据</a><i></i></li>



        </ul>
    </dd>
 <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'){?>
		<dd>
		<!-- <div class="title">
		<span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>通知
		</div>
		<ul class="menuson">

			<li><cite></cite><a href="/index.php/back/Allnotice/show.html" target="rightFrame">通知消息</a><i></i></li>

			<li><cite></cite><a href="/index.php/back/Tool/roomToolshow.html" target="rightFrame">审核</a><i></i></li>

			</ul> -->
		</dd>
		<?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'){?>
		<dd>
		<div class="title">
		<span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>运营数据管理
		</div>
		<ul class="menuson">

			<li><cite></cite><a href="/index.php/back/extend/show.html" target="rightFrame">运营数据</a><i></i></li>
			<li><cite></cite><a href="/index.php/back/extend/downshow.html" target="rightFrame">官网下载页数据</a><i></i></li>


			</ul>
		</dd>
<?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='安卓'||  $qianxian=='苹果' ){?>
    <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico01.png" /></span>版本管理
    </div>
    	<ul class="menuson">
<?php if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='安卓'){?>
    <li><cite></cite><a href="/index.php/back/common/ashow.html" target="rightFrame">安卓版本管理</a><i></i></li>
<?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='苹果'){?>
    <li><cite></cite><a href="/index.php/back/common/ishow.html" target="rightFrame">苹果版本管理</a><i></i></li>
	<li><cite></cite><a href="/index.php/back/common/ershow.html" target="rightFrame">二维码马甲版本管理</a><i></i>
	<li><cite></cite><a href="/index.php/back/common/ershowdd.html" target="rightFrame">俊的账号版本管理</a><i></i>
<?php } ?>
     </li>


        </ul>
    </dd>
   <?php } if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理' || $qianxian=='广州助理'|| $qianxian=='杭州助理'|| $qianxian=='深圳助理'|| $qianxian=='珠海助理'|| $qianxian=='广州销售'|| $qianxian=='珠海销售'|| $qianxian=='杭州销售'|| $qianxian=='深圳销售'){?>

    <dd>
    <div class="title">
    <span><img src="<?php echo BACK_IMG_URL; ?>leftico02.png" /></span>客户管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="/index.php/back/Service/show.html" target="rightFrame">我的客户管理</a><i></i></li>
        <li><cite></cite><a href="/index.php/back/Service/gkshow.html" target="rightFrame">公海池</a><i></i></li>
       
        <?php if($qianxian=='管理员' || $qianxian=='总经理'|| $qianxian=='总部助理'||  $qianxian=='广州经理'|| $qianxian=='杭州经理'|| $qianxian=='深圳经理'|| $qianxian=='珠海经理'){?>
        <li><cite></cite><a href="/index.php/back/Service/jlshow.html" target="rightFrame">客户监控</a><i></i></li>
 <?php } ?>


        </ul>
    </dd>
 <?php } ?>




    </dl>

</body>
</html>
