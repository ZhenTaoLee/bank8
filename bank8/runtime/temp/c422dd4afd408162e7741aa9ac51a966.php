<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/index/index.html";i:1527576573;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>八号钱庄</title>
	
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="description" content="八号钱庄是我司目前的主要产品，集成“智能匹配+产品推荐+链接银行+客服协助“于一身的新商业模式，入口端为app，与线上官网咨询，通过服务端在线客服团队引流到app准入。">
	<meta name="keywords" content="八号钱庄,八号助手,金融工具,中瀛科技,鑫易贷,">
	<link rel="icon" href="<?php echo BACK_IMG_URL; ?>web/icon.png" type="image/jpeg"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/indexv1.0.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/publicv1.0.css">

</head>
<body>
	<!-- 顶部 -->
	<!-- <div class="navbar-fixed-top top-title"> -->
	<div class="top">
		<div class="container">
			<p>客服热线 :020-3847-2070</p>
		</div>
	</div>

	<!-- 导航栏 开始 -->
	<div class="navbar " role="navigation">
	    <nav class="container ">
	        <div class="navbar-header ">
	            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse"
	                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a href="https://www.8haoqianzhuang.com/"><img src="<?php echo BACK_IMG_URL; ?>web/八号钱庄官网LOGO.png" alt="" style=""></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse navbar-right" aria-expanded="ture">
	            <ul class="nav navbar-nav ">
	                <li><a href="/index/index/index/index.html" class="active ">首页</a></li>
	                <li><a href="/index/index/download/downlad.html" class="">下载APP</a></li>
	                <li><a href="/index/index/journalism/journalism.html" class="">新闻资讯</a></li>
	                <li><a href="/index/index/aboutus/aboutus.html" class="">关于我们</a></li>
	            </ul>
	        </div>
	    </nav>
	</div>
	<!-- </div> -->
	<!-- 导航栏 结束 -->
	<!-- banner -->
	<main class="main">
		<!-- <div class="topbanner">

		</div> -->
		<div class="banner">
			<!-- 借款申请 -->
			<div class="bg-img">
			<div class="container">
				<div class="row">
	           <div class="col-md-4 col-md-offset-8">
	                <div class="Apply">
	                    <form action="" class="form form-horizontal" name="myform" onsubmit="return checkpost();">
		                   	<h3>借款申请</h3>
		                   	<div class="padding-top form-group form-horizontal1 col-md-12">
		                        <select class="select" name="selectname">
							        <option value="个人"selected="selected">个人</option>
									<!-- <option value="">个人</option> -->
									<option value="公务员">公务员</option>
									<option value="法人或股东">法人或股东</option>
									<option value="其它">其它</option>
		    					</select>
		                   	</div>

							<div class="form-group form-horizontal1 col-md-12">
								<select class="select" id="city" name="city">
									<option value="广州"selected="selected">广州</option>
									<option value="深圳">深圳</option>
									<option value="珠海">珠海</option>
									<option value="杭州">杭州</option>
								</select>
							</div>

		                   	<!-- <div class="form-group form-horizontal1 col-md-12">
		                        <input type="text" placeholder="请输入您的所在城市" id="city" name="city"></input>
		                    </div> -->

		                    <div class="form-group form-horizontal1 col-md-12">
		                        <input type="text" placeholder="请输入您的真实姓名" id="name" name="name"></input>
		                    </div>
		                    <div class="form-group form-horizontal1 col-md-12">
		                        <input type="text" placeholder="请输入11位手机号码" id="phone" name="phone"></input>
		                    </div>
		                    <div class="form-group form-horizontal1">
		                   		<div class="col-md-6 text">
		                       		<input type="text" id="verfifcation" name="verfifcation" placeholder="请填写验证码" ></input>
		                   		</div>
		                       <div class="col-md-6 text-right">
		                           <button  id="phonecode" class="btn btn1" type="button" value="获取验证码" >获取验证码</button>
		                           <!-- <input type="button"  id="phonecode"   class="btn btn1" value="获取验证码" onclick="sendCode(this)" style="width: 100px;" /> -->
		                       </div>
		                    </div>
		                    <div class="form-group form-horizontal radio">
			                   	<div class="col-md-4 col-md-offset">
			                   		<input  type="radio" value="房押贷" checked  name="identity" >房押贷</input>
			                   	</div>
			                   	<div class="col-md-4 col-md-offset">
			                   		<input  type="radio" value="车押贷" name="identity">车押贷</input>
			                   	</div>
			                   	<div class="col-md-4 col-md-offset">
			                   		<input  type="radio" value="薪金贷" name="identity">薪金贷</input>
			                   	</div>
		                    </div>
		                    <div class="form-group">
		                        <div class="col-md-12">
		                        <button type="button" id="submit" class="btn btn-primary col-md-12"  style="background-color: #377BEE">快速申请</button>
		                        </div>
		                    </div>
							<div class="form-group form-horizontal " style="margin-left: 1px;margin-bottom: 0;">
							 	<p><input type="checkbox" name="vehicle" value="Car" checked="checked" />我已阅读并同意<a href="/index/index/serviceagreement/serviceagreement.html" style="color:#377BEE;">《用户服务条约》</a></p>
							 </div>
	                    </form>
	                </div>
	            </div>
	            </div>
		    </div>
		    </div>
		</div>

		<!-- <div class="bg-color">
			<div class="container">
				<div class="row">

					<div class="imgs col-md-6 col-sm-12 col-xs-12">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="img">
								<img src="<?php echo BACK_IMG_URL; ?>web/出国留学.png" alt="">
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="img">
								<img src="<?php echo BACK_IMG_URL; ?>web/装修房子.png" alt="">
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="img">
								<img src="<?php echo BACK_IMG_URL; ?>web/买车买房.png" alt="">
							</div>
						</div>
					</div>
					<div class="right col-md-6 col-sm-12 col-xs-12">
						<div class="edu col-md-8 col-sm-6">
							<p>额度</p>
							<span><b class="counter-demo-1 timer count-title " id="count-number" data-to="300000">0</b>元</span>
						</div>
						<div class="col-md-4 col-sm-6 text-right">
							<button type="button" class="btn tc" id="myBtn">立即申请</button>
						</div>
					</div>
					 <div class="col-md-6 col-sm-6 col-xs-6">
						<div class="ios">
							<a href="/index/index/downloadProcess/downloadProcess.html">
								<button id="downlad" class="btn iphone"></button>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="android">
							<a href="https://www.8haoqianzhuang.cn/static/apk/Bank8V2.1.0.apk">
								<button></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- <a href="/index/index/download/downlad.html">
			<div class="bg-img-downlad">
			</div>
		</a> -->
		<!-- 信贷匹配 -->
		<div class="credit">
			<div class="container">
				<div class="row">
					<div class="line col-md-5 col-sm-3"></div>
					<div class="line line1 navbar-right col-md-5"></div>
					<div class="">
						<div class="title text-center">
							<h5>信贷匹配</h5>
							<span>CREDIT TO MATCH </span>
							<p></p>
						</div>
					</div>
				</div>
				<div class="row block">
					<div class="col-md-3 col-sm-6 col3">
						<div class="fangchan">
							<div class="text">
								<h5>房产信用贷</h5>
								<p>全款房</p>
								<p>按揭房</p>
								<p>抵押房均可办理</p>
								<p>额度高</p>
								<p>无需抵押</p>
							</div>
							<div class="liaojie">
								<a href="/index/index/product?goodtype=1"><button class="btn">了解更多</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col3">
						<div class="chelaing">
							<div class="text">
								<h5>车辆信用贷</h5>
								<p>按揭车</p>
								<p>抵押车均可办理</p>
								<p>成数高</p>
								<p>手续方便</p>
							</div>
							<div class="liaojie">
								<a href="/index/index/product?goodtype=2"><button class="btn">了解更多</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col3">
						<div class="baodan">
							<div class="text">
								<h5>保单信用贷</h5>
								<p>生效满半年以上即可办理</p>
								<p>无需抵押车任何证件</p>
								<p>涵盖绝大部分保险种类</p>
							</div>
							<div class="liaojie">
								<a href="/index/index/product?goodtype=3"><button class="btn">了解更多</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col3">
						<div class="gongjijin">
							<div class="text">
								<h5>公积金信用贷</h5>
								<p>专为上班族而设</p>
								<p>条件宽松</p>
								<p>机构多</p>
								<p>适合不同情况的上班族</p>
							</div>
							<div class="liaojie">
								<a href="/index/index/product?goodtype=5"><button class="btn">了解更多</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- 流程介绍 -->
		<div class="introduce">
			<div class="container">
				<div class="row">
					<div class="line col-md-5 col-sm-3"></div>
					<div class="line line1 navbar-right col-md-4"></div>
					<div class="">
						<div class="title text-center">
							<h5>流程介绍</h5>
							<span>THE PROCESS IS INTRODUCED</span>
							<p></p>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="col-md-6 col-xs-12 left">
						<p class="color"><span>轻松三步</span>贷款快速到账</p>
						<p class="fy">Rapld loon to the occounl</p>
						<p class="wire"></p>
						<div class="text">
							<p>无需到访门店，在线三步轻松申请快捷方便，运用先进快捷的贷款程序10秒内获得申请结果，最快一天放款！</p>
						</div>
						<button type="burron" class="btn tc">立即申请</button>
					</div>
					<div class="col-md-6 col-xs-12 img-right">
						<img src="<?php echo BACK_IMG_URL; ?>web/轻松三步.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<!-- 实用小工具 -->
		<div class="tool">
			<div class="container">
			<div class="row">
				<div class="line col-md-6"></div>
				<div class="line line1 navbar-right col-md-6"></div>
				<div class="">
					<div class="title text-center">
						<h5>实用小工具</h5>
						<span>CREDIT TO MATCH</span>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row block">
			 	<div class="col-md-4 col-sm-4 col-xs-4">
			 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html#mortgageCalculator"><div class="houdingLoan">

			 		</div></a>
			 	</div>
			 	<div class="col-md-4 col-sm-4 col-xs-4">
			 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html#vehiclevaluation"><div class="vehicle">

			 		</div></a>
			 	</div>
			 	<div class="col-md-4 col-sm-4 col-xs-4">
			 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html#taxCalculator"><div class="taxation">

			 		</div></a>
			 	</div>
			</div>
		</div>
	</div>


	<!-- 问题资讯开始 -->
	<div class="tow">
		<div class="container">
		 	<div class="list">
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="title text-center">
						<h5>常见问题</h5>
						<span>CREDIT TO MATCH</span>
						<p></p>
					</div>
					<ul class="problemList">
						  <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						  <li>
						    <a href="/index/index/commonproblem?id=<?php echo $vo['issue_id']; ?>" class="tryitbtn">
						    <p><?php echo $vo['headline']; ?></p>
						    </a>
						  </li>
						  <?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<a href="/index/index/problemList/problemList.html" style="color: #fff;"><button type="button" class="btn col-lg-offset-4 col-md-offset-4 col-xs-offset-3 col-sm-offset-3 ">更多问题</button></a>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 newest">
					<div class="title text-center">
						<h5>最新资讯</h5>
						<span>CREDIT TO MATCH</span>
						<p></p>
					</div>
					<div class="news">
						<a href="/index/index/newsdetail?id=<?php echo $list["journalism_id"]; ?>">
							<div class="col-lg-6 hidden-md hidden-xs hidden-sm " style="width: 230px; height: 196px;">
								<img src="<?php echo $list["picture"]; ?>" alt="">
							</div>
							<div class="text scroll" id="scroll" >
								<h5><?php echo $list["headline"]; ?></h5>
								<div id="box" class="roll tip_box" >
									<p class="con content-container"id="demo2" style=""><?php echo $list["webtext"]; ?></p>
								</div>
							</div>
						</a>
					</div>
					<a href="/index/index/journalism/journalism.html" style="color: #fff;"><button type="button" class="btn col-lg-offset-4 col-md-offset-4 col-xs-offset-3 col-sm-offset-3">更多新闻</button></a>
				</div>
			</div>
		</div>
	</div>
		<!-- 关于鑫易贷 -->
		<div class="about">
			<div class="container">
			<div class="row">
				<div class="line col-md-6"></div>
				<div class="line line1 navbar-right col-md-6"></div>
				<div class="">
					<div class="title text-center">
						<h5>关于我们</h5>
						<span>ABOUT US</span>
						<p></p>
					</div>
				</div>
			</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		 	<div class="block">
		 		<p>深圳鑫易贷互联网金融有限公司成立于2015年，注册资金5000万，是一家专业的信息服务互联网金融平台，旗下拥有线上大型金融超市「八号钱庄」「八号幸福」两大品牌，均由子公司广州中瀛信息科技有限公司开发完成。目前全国有五家分公司，主要效劳于中小企业及个人，提供贷款融资，购置车房，投资保险咨询等的专业线上一对一管家服务。以“让客户没有信息障碍，将信息透明进行到底“为中心价值。希望通过我们的专业服务和不懈努力，重塑信息透明互联网新征程。</p>
		 	</div>
		 	<div class="button">
		 		<a href="/index/index/aboutus/aboutus.html"><button type="button" class="btn">了解更多</button></a>
		 	</div>
		</div>
		</div>
	</div>

	</main>

	<!-- 下载 -->
	<div class="downlad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-12 col-sm-12">
					<div class="col-sm-3 text-center" >
						<h5 class="hidden-xs hidden-sm"><a href="/index/index/aboutus/aboutus.html">关于我们</a></h5>
						<ul class="list-unstyled ">
							<li><a href="/index/index/aboutus/aboutus.html#companyprofile">公司简介</a></li>
							<li><a href="/index/index/aboutus/aboutus.html#productadvantage">产品优势</a></li>
							<li><a href="/index/index/aboutus/aboutus.html#businessmodel">联系我们</a></li>
						</ul>
					</div>
					<div class="col-sm-3 text-center">
						<h5 class="hidden-xs hidden-sm"><a href="/index/index/download/downlad.html">下载APP</a></h5>
						<ul class="list-unstyled">
							<li class="hidden-lg hidden-md"><a href="/index/index/download/downlad.html">下载APP</a></li>
						</ul>
					</div>
					<div class="col-sm-3 text-center">
						<h5 class="hidden-xs hidden-sm"><a href="index/index/journalism/journalism.html">新闻资讯</a></h5>
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

	<!-- 尾部 -->
	<footer class="text-center container" style="width: 100%; background-color: #423D47">
		<div class="container" style="padding-top: 20px;padding-bottom: 10px">
			<!--<p style="color: #fff; font-size: 13px;">版权所有深圳市鑫易贷互联网金融有限公司/ICP备案号：<a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action;jsessionid=qC41-hFNd8uMSIPcb0E6b67GlknQaSnxyHhTe-Zcnlt8LioAolzG!495133832"  style="color:#377BEE;">粤ICP备15104065号-1</a></p>-->

			<p style="color: #fff; font-size: 13px;">版权所有广州中瀛信息科技有限公司/ICP备案号：<a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action;jsessionid=qC41-hFNd8uMSIPcb0E6b67GlknQaSnxyHhTe-Zcnlt8LioAolzG!495133832"  style="color:#377BEE;">粤ICP备17053318号-1</a></p>
		</div>
	</footer>
	<!-- 悬浮 -->
	<div id="return-top" class="hidden-md hidden-xs hidden-sm">
		<img src="<?php echo BACK_IMG_URL; ?>web/公众号.png" alt="" class="publicNumber" id="publicNumber" style="display: none;">
		<div class="weixin top-weixin" id="weixin">
			<img src="<?php echo BACK_IMG_URL; ?>web/微信.png" onmouseover='src="<?php echo BACK_IMG_URL; ?>web/微信悬停.png"' onmouseout='src="<?php echo BACK_IMG_URL; ?>web/微信.png"' alt="">
		</div>
		<div class="qq">
			<img src="<?php echo BACK_IMG_URL; ?>web/QQ.png" onmouseover='src="<?php echo BACK_IMG_URL; ?>web/客服QQ悬停.png"' onmouseout='src="<?php echo BACK_IMG_URL; ?>web/QQ.png"' alt="">
		</div>
		<div class="kefu">
			<img src="<?php echo BACK_IMG_URL; ?>web/在线客服.png" onmouseover='src="<?php echo BACK_IMG_URL; ?>web/在线客服悬停.png"' onmouseout='src="<?php echo BACK_IMG_URL; ?>web/在线客服.png"' alt="">
		</div>
		<div class="dingbu" id="">
			<a href="#"><img src="<?php echo BACK_IMG_URL; ?>web/返回顶部.png" onmouseover='src="<?php echo BACK_IMG_URL; ?>web/返回顶部悬停.png"' onmouseout='src="<?php echo BACK_IMG_URL; ?>web/返回顶部.png"' alt=""></a>
		</div>
	</div>

		<!-- 弹窗 开始-->
		<div id="gray"></div>
		<div class="popup" id="popup">

			<div class="min">
			<div class="top_nav" id="top_nav">
				<div class="guan">
					<a class="guanbi"><img src="<?php echo BACK_IMG_URL; ?>web/取消.png" alt=""></a>
				</div>
			</div>
				<form action="" class="form form-horizontal" name="myform">
					<table>
					<tr>
						<td colspan=3>
							<select class="select" id="tcity" name="tcity">
								<option value="广州"selected="selected">广州</option>
								<option value="深圳">深圳</option>
								<option value="珠海">珠海</option>
								<option value="杭州">杭州</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan=3>
							<input type="text" class="chang" id="tname" name="tname" placeholder="请输入您的称呼" ></input>
						</td>
					</tr>
					<tr>
						<td>
							<input  type="radio" class="dan" value="先生" checked name="tidentity" ><span style="color: #fff;margin-left: 10px;">先生</span></input>
						</td>
						<td>
							<input  type="radio" class="dan" value="女士" name="tidentity" ><span style="color: #fff; margin-left: 10px;">女士</span></input>
						</td>
						<td>

						</td>
					</tr>
					<tr>
						<td colspan=3>
							<input type="text" class="chang" id="tphone" name="tphone" placeholder="请输入您手机号码" ></input>
						</td>
					</tr>

					<tr>
						<td colspan=2>
							<input type="text" class="duan" id="tverfifcation" name="tverfifcation" placeholder="请输入验证码"></input>
						</td>
						<td>
							<!-- <button  id="tphonecode" class="yanzhengma" type="button" value="获取验证码" onclick="tsendCode(this)" >获取验证码</button> -->
							<button  id="tphonecode" class="yanzhengma" type="button" value="获取验证码" >获取验证码</button>
						</td>
					</tr>
					<tr>
						<td colspan=3>
							<p><input type="checkbox" name="vehicle" value="Car" checked="checked" />我已阅读并同意<a href="/index/index/serviceagreement/serviceagreement.html" style="color:#377BEE;">《用户服务条约》</a></p>
						</td>
					</tr>
					<tr>
						<td colspan=3>
							<button type="button" id="tsub" class="button">提交</button>
						</td>
					</tr>
					</table>
				</form>
			</div>
		</div>
		<!-- 弹窗 结束-->

	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/indexsend.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/suspension.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/indexnews.js"></script>
</body>
</html>
