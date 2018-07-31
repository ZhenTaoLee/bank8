<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="stylesheet" type="text/css" href="{$Think.const.BACK_CSS_URL}bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="{$Think.const.BACK_CSS_URL}assets/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="{$Think.const.BACK_CSS_URL}assets/ionicon/css/ionicons.min.css">


	    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700" rel="stylesheet">

	    <!-- Owl Carousel Assets -->
	    <link rel="stylesheet" href="{$Think.const.BACK_CSS_URL}assets/css/owl.carousel.css">
	    <link rel="stylesheet" href="{$Think.const.BACK_CSS_URL}assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="{$Think.const.BACK_CSS_URL}assets/css/owl.theme.default.min.css">
		<!--设置网页标题小图标-->
		<link rel="icon" href="./assets/icon/1.png" type="image/jpeg"/>
		<!-- Custom  Design assets -->
		<link rel="stylesheet" type="text/css" href="{$Think.const.BACK_CSS_URL}assets/css/main.css">
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/media.css"> -->
			<title>八号钱庄</title>
	</head>

	<body>

	<!-- It's for the click in body -->
		<!-- <div class="overlay" id="overlay" onclick="closeNav()"></div> -->
		<!-- This menu will be shown after scrolling -->

		 <nav id="nav" class="custom-menu navbar navbar-inverse navbar-fixed-top">
			    <div class="container">
				    <div class="col-md-6 col-xs-6 craft-bar">
							<a href="index.html"><img src="{$Think.const.BACK_IMG_URL}logo.png"></a>
					</div>
	                <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 craft-bar text-right">
	                    <div class="main" id="main">
	                      <a onClick="openNav()">
							  <!--导航-->
								<img class="zoom-act" src="{$Think.const.BACK_IMG_URL}menu.png">
							</a>
	                    </div>
	                </div>
				</div>
			</nav>
			<!--This is the sidenav bar  -->
			<div id="mySidenav" class="sidenav text-center">
                <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a><br>
								<a href="https://www.8haoqianzhuang.com/">首页</a><hr>
								<a href="https://www.8haoqianzhuang.cn/static/apk/Bank8V2.0.1.apk">安卓下载</a><hr>
                <a href="JavaScript:;" onclick="javaScript:alert('IOS客户端五一后上架，敬请期待')";>IOS下载</a><hr>
                <!-- <a href="#explore">Explore</a><hr> -->
				<!-- <a href="#mindcraft-action">Action</a><hr>
				<a href="#testimonial-section">Testimonial</a><hr>
                <a href="#user-interface">User-interface</a><hr>
				<a href="#newsletter">Newsletter</a> -->
            </div>
		<!-- Head section taking full device height -->
		<section id="head" class="head">
		    <div class="blur">   <!-- Blur div is for bluring the bacground image -->
				<div class="container">
					<!-- <div class="row menu-bar">
						<div class="col-md-6 col-xs-6">
							<a href="index.html"><img src="assets/icon/logo.png"></a>
						</div>
						<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 text-right">
		                    <div class="main" id="main">
		                      <a onclick="openNav()">
									<img src="assets/icon/menu.png">
								</a>
		                    </div>
		                </div>
					</div> -->
					<div class="row head-body">
						<div class="col-md-7 col-xs-12 head-items">
							<h1>八号钱庄 APP</h1>
							<p class=" fun-text">24小时在线，您的融资百科辞典</p>
							<!-- <a href="#" class="btn craft-btn"> -->
								<a href="#" class="btn craft-btn" onclick="javaScript:alert('IOS客户端五一后上架，敬请期待')"; >

								<span class="fa fa-apple"></span>
							<!-- <span class="fa  fa-weixin"></span> -->

							<div class="craft-btn-content">
									<!-- <h6>Download for</h6> -->
									<h4>iOS 下载</h4>
								</div>
							</a>
							<a href="https://www.8haoqianzhuang.cn/static/apk/Bank8V2.0.1.apk" class="btn craft-btn">
								<!-- <a href="javascript:;" class="btn craft-btn"> -->

								<span class="fa fa-android"></span>
									<!-- <span class="fa fa-weibo"></span> -->

									<div class="craft-btn-content">
									<!-- <h6>Download for</h6> -->
									<h4>Android 下载</h4>

								</div>

							</a>
							<!-- <p class=" fun-text">赶紧扫码关注我们噢！</p> -->
						</div>

						<div class="col-md-4 col-xs-12">
							<!--<img class="img-responsive" src="assets/img/erweima.png">-->
							<img class="img-responsive" src="{$Think.const.BACK_IMG_URL}dingyuehao.png">

						</div>
					</div>
				</div>
			</div>
		</section>




		<!-- Footer section -->
		<section class="footer">
			<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-3">
							<img class="img-responsive" src="{$Think.const.BACK_IMG_URL}47.png">
						</div>
						<div class="col-md-6 col-xs-6 footer-icon">
							<div class="social footer-social">
									<ul>
										<li><a href="https://weibo.com/u/6313063142?is_hot=1" class="fa fa-weibo fa-2x" aria-hidden="true"></a></li>
										<li><a href="#" class="fa fa-weixin fa-2x" aria-hidden="true"></a></li>
										<li><a href="#" class="fa fa-qq fa-2x" aria-hidden="true"></a></li>
									</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-3">
							<!-- <p class=" footer-text" style:font-family: "微软雅黑"; font-size: 50px;>客服电话: 020-38472060</p>
							<p class=" footer-text" style:font-family: "微软雅黑"; font-size: 50px;>联系地址：广东省广州市天河区珠江东路11号高德置地-秋广场804</p> -->
							<p class=" footer-text" style:font-family: "微软雅黑"; font-size: 50px;>版权所在@广州中瀛信息科技有限公司 / <a href="http://8bank.8haoqianzhuang.com/home/showabout">隐私声明</a> / <a href="http://www.miitbeian.gov.cn/">粤ICP备17053318号-1</a> </p>
						</div>
					</div>
			</div>
		</section>

	    <!-- Javascript files -->

		<!-- <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js" ></script>
		<script src="assets/js/bootstrap.min.js"></script> -->
		<!-- Carousel script file -->
		<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
		<!-- Custom script file -->
		<!-- <script type="text/javascript" src="assets/js/main.js" ></script> -->
	</body>
</html>
