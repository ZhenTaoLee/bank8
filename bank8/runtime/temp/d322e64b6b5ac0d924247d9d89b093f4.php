<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/finance/hotdetails.html";i:1532590412;}*/ ?>
<!DOCTYPE html>
<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" href="<?php echo CSST_URL; ?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo CSST_URL; ?>hotdetails.css">
	<style type="text/css">
    *{ margin:0; padding:0;}
    .wrapper{white-space: nowrap; overflow: hidden;width: 68%;}
    .inner{ width:1000px;overflow:hidden;}
    .inner h2{ display:inline-block;}
  </style>
</head>
<body>
	<!-- 银行 -->
	<div class="bank">
		<!-- logo-name -->
		<div class="logo-name-tab">
			<div class="logo">
				<img src="<?php echo $list['logo']; ?>">
				<!-- 已下架才需要显示 否则隐藏 display: none-->
				<div class="lowerframe" style="display: none;">
					<span>已下架</span>
				</div>
			</div>
			<div class="bankName">
				<div id="wrapper" class="wrapper">
    				<div class="inner">
						<h2><?php echo $list['goodName']; ?> &nbsp </h2>
					</div>
  				</div>
				<div class="tab">

					<?php if(strpos($list['label'],'手续简单') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/5dabf201807031026281942.png" alt=""> 手续简单</span>
					<?php }if(strpos($list['label'],'额度高') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/3fe8d201807031027321223.png" alt=""> 额度高</span>
					<?php }if(strpos($list['label'],'放款快') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/a4aef201807031028223351.png" alt=""> 放款快</span>
					<?php }if(strpos($list['label'],'零抵押') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/2cf6a201807031028544407.png" alt=""> 零抵押</span>
					<?php }if(strpos($list['label'],'零担保') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/3ac7f201807031029246692.png" alt=""> 零担保</span>
					<?php }if(strpos($list['label'],'低利息') !== false){ ?>
					<span><img src="https://zykj.8haoqianzhuang.cn/96012201807031029549444.png" alt=""> 低利息</span>
					<?php } ?>


				</div>
			</div>
		</div>
		<div class="bank-bottom">
			<div class="kuai left">
				<p>申请人数</p><br>
				<p><?php echo $list['popularity']; ?></p>
			</div>
			<div class="kuai left">
				<p>下款时间 </a><img src="images/details_icon_careful.png" alt="" id="onlyChoseAlert"></p><br>
				<p>10分钟</p>
			</div>
			<div class="kuai ">
				<p>贷款成功率</p><br>
				<p><?php echo $list['rate']; ?></p>
			</div>
		</div>
	</div>
	<div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 贷款额度 -->
    <div class="layer orange">
   		<h2 class="title">贷款额度</h2>
   		<p><?php echo $list['limit']; ?></p>
    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 费用利率 -->
    <div class="layer orange">
   		<h2 class="title">费用利率</h2>
   		<p><?php echo $list['interest']; ?></p>
    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 贷款期限 -->
    <div class="layer orange">
   		<h2 class="title">贷款期限</h2>
   		<p><?php echo $list['agelimit']; ?></p>
    </div>
       
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 地域 -->
    <div class="layer orange">
   		<h2 class="title">地域</h2>
   		<p><?php echo $list['location']; ?></p>

    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 车辆要求 -->
    <div class="layer">
   		<h2 class="title orange">车辆要求</h2>
   		<p><?php echo $list['carask']; ?></p>

    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 客户要求 -->
    <div class="layer">
   		<h2 class="title">客户要求</h2>
   		<p><?php echo $list['perask']; ?></p>

    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 财力认定（4选1） -->
    <div class="layer">
   		<h2 class="title">财力认定（4选1）</h2>
   		<p><?php echo $list['miso']; ?></p>

    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 负债 -->
    <div class="layer">
   		<h2 class="title">负债</h2>
   		<p><?php echo $list['liabilities']; ?></p>
    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 申请资料 -->
    <div class="layer">
   		<h2 class="title">申请资料</h2>
   		<p><?php echo $list['datum']; ?></p>

    </div>
    <div style="height:1px;border-bottom:9px solid rgba(245,245,245,0.8)"></div>
    <!-- 放款模式 -->
    <div class="layer footer">
   		<h2 class="title">放款模式</h2>
   		<p><?php echo $list['mode']; ?></p>

    </div>

    <script src="<?php echo JS_URL; ?>jquery.min.js"></script>
	<script src="<?php echo JS_URL; ?>simpleAlert.js"></script>

</body>
</html>