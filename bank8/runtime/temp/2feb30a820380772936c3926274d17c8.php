<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/index/download.html";i:1530080222;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>八号钱庄</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

	<meta name="description" content="八号钱庄是我司目前的主要产品，集成“智能匹配+产品推荐+链接银行+客服协助“于一身的新商业模式，入口端为app，与线上官网咨询，通过服务端在线客服团队引流到app准入。">
	<meta name="keywords" content="八号钱庄,八号助手,金融工具,中瀛科技,鑫易贷,">
	<link rel="icon" href="<?php echo BACK_IMG_URL; ?>web/icon.png" type="image/jpeg"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/index.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/publicv1.0.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/downloadv1.0.css">
	<title>下载APP</title>
	<style media="screen">
	#weixin-p{display:none;position:fixed;left:0;top:0;background:rgba(0,0,0,0.8);filter:alpha(opacity=80);width:100%;height:100%;z-index:100;}
	#weixin-p p{text-align:center;margin-top:10%;padding:0 5%;position:relative;}
	#weixin-p .closes{color:#fff;padding:5px;font:bold 30px/34px simsun;text-shadow:0 1px 0 #ddd;position:absolute;top:0;left:5%;}
	#imged{width:100%;height:100%;}
	</style>
</head>
<body>
	<!-- 顶部 -->
	<div class="top">
		<div class="container">
			<p>客服热线 :020-3847-2070</p>
		</div>
	</div>

	<!-- 导航栏 开始 -->
	<div class="navbar " role="navigation">
	    <nav class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
	                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a href="https://www.8haoqianzhuang.com/"><img src="<?php echo BACK_IMG_URL; ?>web/八号钱庄官网LOGO.png" alt=""></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse navbar-right" aria-expanded="ture">
	            <ul class="nav navbar-nav">
	                <li><a href="/index/index/index/index.html" class="col-sx-12">首页</a></li>
	                <li><a href="/index/index/download/downlad.html" class="col-sx-12 active">下载APP</a></li>
	                <li><a href="/index/index/journalism/journalism.html" class="col-sx-12">新闻资讯</a></li>
	                <li><a href="/index/index/aboutus/aboutus.html" class="col-sx-12">关于我们</a></li>
	            </ul>
	        </div>
	    </nav>
	</div>
	<!-- 导航栏 结束 -->
	<!-- banner -->
	<main>
		<div class="banner">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="font">
						<p>一触及8</p>
						<div class="img">
							<img src="<?php echo BACK_IMG_URL; ?>web/Android.png" alt="" style="">
						</div>
						<div class="btn">
							<!-- <a href="https://fir.im/6jq8"></a> -->
							<!-- <a href="itms-services://?action=download-manifest&url=https://zykj.8haoqianzhuang.cn/bank8.plist"><button  id="downlad" class="btn iphone"></button></a> -->
							<div class="col-md-6 col-sm-12 col-xs-12"><a href="https://itunes.apple.com/cn/app/%e5%85%ab%e5%8f%b7%e5%ba%84/id1393937704?mt=8"><button  name="number" id="downlad" class="btn iphone"></button></a></div>

							<div id="weixin-p"><p><span id="closes" title="关闭" class="closes"><img  id="imged" src="<?php echo BACK_IMG_URL; ?>web/wechat.png" alt="微信打开"/>关闭</span></p></div>

							<div class="col-md-6 col-sm-12 col-xs-12"><a href="<?php echo $list['anurl']; ?>"><button name="num" id="but" class="btn android"></button></a></div>

							<!-- <div id="weixin-tip"><p><img  id="imgs" src="<?php echo BACK_IMG_URL; ?>web/安卓wechat.png" alt="微信打开"/><span id="close" title="关闭" class="close">×</span></p></div> -->
						</div>
					</div>
				</div>
		 	</div>
		</div>
		<!-- start here-->
		<div class="hezuo-us">
			<div class="container">
				<div class="hezuo-us-main">
					<div class="col-md-6 col-sm-12 col-xs-12 hezuo-us-left">
						<img class="img-responsive"   src="<?php echo BACK_IMG_URL; ?>web/合作.png" alt="">
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 hezuo-us-right">
						<h3>官方合作,  全力打造</h3>
						<h4>提供更多更好的安全保障, 为您提供贴心服务</h4>
						<!-- <p>中途大健康武汉东湖我肯定会问客户的文件蝴蝶结我回到家</p> -->
					</div>

					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--end here-->



		<!--why us start here-->
		<div class="why-us">
			<div class="container">
				<div class="why-us-main">

					<div class="col-md-6 why-us-right">
						<img src="<?php echo BACK_IMG_URL; ?>web/精准.png" alt="">
					</div>
					<div class="col-md-6 why-us-left">
						<h3>数据精准,  来源可靠</h3>
						<h4>官方提供数据源, 强大可靠，安全保险</h4>
						<!-- <p>谁是好的哈建华大街啊哈都加啊好多酒哈加多谁是好的哈建华大街啊哈都加啊好多酒哈加多</p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--why us end here-->



		<!-- start here-->
	<div class="hezuo-us">
		<div class="container">
			<div class="hezuo-us-main">

				<div class="col-md-6 col-sm-12 col-xs-12 hezuo-us-left">
					<img class="img-responsive"   src="<?php echo BACK_IMG_URL; ?>web/渠道.png" alt="">
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 hezuo-us-right">
					<h3>官方合作代办渠道,  快速可靠</h3>
					<h4>官方授权办理,全程简单安全无烦杂手续</h4>
					<!-- <p>中途大健康武汉东湖我肯定会问客户的文件蝴蝶结我回到家</p> -->
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end here-->



	<!--why us start here-->
	<div class="why-us">
		<div class="container">
			<div class="why-us-main">

				<div class="col-md-6 why-us-right">
					<img src="<?php echo BACK_IMG_URL; ?>web/在线.png" alt="">
				</div>
<div class="col-md-6 why-us-left">
					<h3>在线办理,  又快又好</h3>
					<h4>手机端一键办理,节省时间,轻松有速度,官方保障,让您无后顾之忧。</h4>
					<!-- <p>谁是好的哈建华大街啊哈都加啊好多酒哈加多谁是好的哈建华大街啊哈都加啊好多酒哈加多</p> -->
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--why us end here-->

	<!-- 下载 -->
	<div class="downlad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-12 col-sm-12">
					<div class="col-sm-3 text-center" >
						<h5 class="hidden-xs hidden-sm">关于我们</h5>
						<ul class="list-unstyled ">
							<li><a href="/index/index/aboutus/aboutus.html#companyprofile">公司简介</a></li>
							<li><a href="/index/index/aboutus/aboutus.html#productadvantage">产品优势</a></li>
							<li><a href="/index/index/aboutus/aboutus.html#businessmodel">联系我们</a></li>
						</ul>
					</div>
					<div class="col-sm-3 text-center">
						<h5 class="hidden-xs hidden-sm">下载APP</h5>
						<ul class="list-unstyled">
							<li class="hidden-lg hidden-md"><a href="/index/index/download/downlad.html">下载APP</a></li>
						</ul>
					</div>
					<div class="col-sm-3 text-center">
						<h5 class="hidden-xs hidden-sm">新闻资讯</h5>
						<ul class="list-unstyled">
							<li><a href="/index/index/problemList/problemList.html">常见问题</a></li>
						</ul>
					</div>
					<div class="col-sm-3 text-center">
						<h5 class="hidden-xs hidden-sm">用户声明</h5>
						<ul class="list-unstyled">
							<li><a href="#">免责声明</a></li>
							<li><a href="/index/index/privacy/privacy.html">隐私协议</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 hidden-md hidden-xs hidden-sm scavenging">
					<div class="thumbnail">
				      <img src="<?php echo BACK_IMG_URL; ?>web/公众号.jpg" alt="">
				        <span style="text-align: center;">微信公众号</span>
				    </div>
					<div class="thumbnail">
				      <img src="<?php echo BACK_IMG_URL; ?>web/Android.png" alt="">
				        <span style="text-align: center;">APP下载</span>
				    </div>
				</div>
				<div class="col-lg-3 text-right hidden-md hidden-xs hidden-sm">
					<p style="font-size: 22px;color: #979A9D">客服热线</p>
					<p style="font-size: 28px;color: #377BEE;">020-3847-2070</p>
					<p style="font-size: 20px;color: #979A9D">（09:00~18：00）</p>
				</div>
			</div>
		</div>
	</div>
		</main>


		<!-- 尾部 -->
		<footer class="text-center container" style="width: 100%; background-color: #423D47">
			<div class="container" style="padding-top: 20px;padding-bottom: 10px">
				<!-- <p style="color: #fff; font-size: 13px;">版权所有深圳市鑫易贷互联网金融有限公司/ICP备案号：<a href="http://www.beianbeian.com/s?keytype=5&q=%E7%B2%A4ICP%E5%A4%8715104065%E5%8F%B7-1"  style="color:#377BEE;">粤ICP备15104065号-1</a></p> -->
				<p style="color: #fff; font-size: 13px;">版权所有广州中瀛信息科技有限公司 © 八号钱庄 /ICP备案号：<a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action;jsessionid=qC41-hFNd8uMSIPcb0E6b67GlknQaSnxyHhTe-Zcnlt8LioAolzG!495133832"  style="color:#377BEE;">粤ICP备17053318号-1</a></p>

			</div>
		</footer>

		<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/down.js"></script>
		<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/iosclick.js"></script>
		<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/androidclick.js"></script>

		<!-- <script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/download.js"></script> -->

		<script type="text/javascript">

		</script>

</body>
</html>
