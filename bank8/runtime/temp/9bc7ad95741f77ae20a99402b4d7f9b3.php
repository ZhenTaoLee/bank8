<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/index/journalism.html";i:1527045134;}*/ ?>
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
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/publicv1.0.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/journalismv1.0.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>web/rightv1.0.css">
	<title>新闻资讯</title>
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
	            <a href="https://www.8haoqianzhuang.com/"><img src="<?php echo BACK_IMG_URL; ?>web/中瀛官网LOGO.png" alt=""></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse navbar-right" aria-expanded="ture">
				<ul class="nav navbar-nav">
					<li><a href="/index/index/index/index.html" class="">首页</a></li>
					<li><a href="/index/index/download/downlad.html" class="">下载APP</a></li>
					<li><a href="/index/index/journalism/journalism.html" class="active">新闻资讯</a></li>
					<li><a href="/index/index/aboutus/aboutus.html" class="">关于我们</a></li>
				</ul>
	        </div>
	    </nav>
	</div>
	<!-- 导航栏 结束 -->

	<div class="banner">
		<div class="bg-img"></div>
	</div>
	<main>
		<div class="bg-color">
			<div class="container">
			<div class="row">
				<p class="position">当前位置：新闻资讯</p>
					<div class="col-lg-9 col-md-12 bg-white col-xs-12 col-sm-12 bg-white">
						<div class="title text-center">
							<h4>新闻资讯</h4>
							<span>NEWS</span>
							<p style=""></p>
						</div>
						<div class="left-list">
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<div class="news">
								<a href="/index/index/newsdetail?id=<?php echo $vo['journalism_id']; ?>">
									<div class="content">
										<div class="title">
											<h5><?php echo $vo['headline']; ?></h5>
										</div>
										<div class="images-text">
											<div class="img">
												<img style="width:160px; height:117px;"  src="<?php echo $vo['picture']; ?>" alt="">
											</div>
											<div class="textright">
												<div class="paragraph">
													<p><?php echo $vo['webtext']; ?></p>
												</div>
												<div class="time">
													<?php echo $vo['showtime']; ?>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
							 <?php endforeach; endif; else: echo "" ;endif; ?>



						</div>
						<div>
					<!-- <nav aria-label="Page navigation" class="text-center">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li class="active"><a href="#" >1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav> -->

					<div class="page text-center">
			    	<table style="margin:0 auto;text-align: center;">
			    		<tr>
			    			<?php echo $list->render(); ?>
			    		</tr>
			    	</table>
			    </div>

						</div>
					</div>
					<div class="col-lg-3 hidden-md hidden-xs hidden-sm">
						<div class="right">
						<!-- 借款申请 -->
							<div class="Apply bg-white">
			                    <form action="" class="form form-horizontal" name="myform" onsubmit="return checkpost();">
				                   	<h3>借款申请</h3>
				                   	<div class="padding-top form-group form-horizontal1 col-md-12">
															<select class="select" name="selectname">
														        <option value="个人"selected="selected">个人</option>
																		<!-- <option value="">个人</option> -->
																		<option value="公务员">公务员</option>
																		<option value="业主">业主</option>
								    					</select>
				                   	</div>
				                   	<!-- <div class="form-group form-horizontal1 col-md-12">
				                        <input type="text" placeholder="请输入您的所在城市" id="city" name="city"></input>
				                    </div> -->

														<div class=" form-group form-horizontal1 col-md-12">
															<select class="select" id="city" name="city">
																	<option value="广州"selected="selected">广州</option>
																	<option value="深圳">深圳</option>
																	<option value="珠海">珠海</option>
																	<option value="杭州">杭州</option>
															</select>
														</div>
				                    <div class="form-group form-horizontal1 col-md-12">
				                        <input type="text" placeholder="请输入您的真实姓名" id="name" name="name"></input>
				                    </div>
				                    <div class="form-group form-horizontal1 col-md-12">
				                        <input type="text" placeholder="请输入11位手机号码" id="phone" name="phone"></input>
				                    </div>
				                    <div class="form-group form-horizontal1">
				                   		<div class="col-md-6 text">
				                       		<input type="text" id="verfifcation" name="verfifcation" placeholder="请填写验证码" style=""></input>
				                   		</div>
				                       <div class="col-md-6 ">
										  <button  id="phonecode" class="btn btn1" type="button" value="获取验证码" style="width: 69px;height: 35px; font-size: 12px;text-align: center; margin-left: 25px;">获取验证码</button>
				                           <!-- <input type="button" class="btn btn1" value="获取验证码" onclick="sendCode(this)" style="width: 69px; font-size: 12px;text-align: center; margin-left: 25px;"/> -->
				                       </div>
				                    </div>
				                    <div class="form-group form-horizontal radio">
					                   <div class="col-md-4 col-md-offset">
					                   		<input  type="radio" value="房押贷" name="identity" checked="checked">房押贷</input>
					                   	</div>
					                   	<div class="col-md-4 col-md-offset ">
					                   		<input  type="radio" value="车押贷" name="identity">车押贷</input>
					                   	</div>
					                   	<div class="col-md-4 col-md-offset ">
					                   		<input  type="radio" value="薪金贷" name="identity">薪金贷</input>
					                   	</div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                        <button type="button" id="submit" class="btn btn-primary col-md-11"  style="background-color: #377BEE">立即申请</button>
				                        </div>
				                    </div>
				                    <div class="form-group form-horizontal " style="margin-left: 1px;margin-bottom: 0;">
				                    	<!-- <p><input type="checkbox" name="vehicle" value="Car" checked="checked" />我已阅读并同意<a href="">《鑫易贷服务条约》</a></p> -->
															<p><input type="checkbox" name="vehicle" value="Car" checked="checked" />我已阅读并同意<a href="/index/index/serviceagreement/serviceagreement.html" style="color:#377BEE;">《用户服务条约》</a></p>

				                    </div>
			                    </form>
			                </div>
			               <!-- 实用小工具 -->
			                <div class="tool bg-white">
			                	<div class="tool-head">
			                		<h3>实用小工具</h3>
			                		<div class="images-text-right">
			                		<a href="/index/index/mortgageCalculator/mortgagecalculator.html"><span>更多</span></a><img src="<?php echo BACK_IMG_URL; ?>web/进入.png" alt="" class="gengduo">
			                		</div>
			                	</div>
			                	<div class="block">
								 	<div class="col-md-6 col-sm-6 col-xs-6">
								 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html"><div class="houdingLoan">

								 		</div></a>
								 	</div>
								 	<div class="col-md-6 col-sm-6 col-xs-6">
								 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html"><div class="vehicle">

								 		</div></a>
								 	</div>
								 	<div class="col-md-6 col-sm-6 col-xs-6">
								 		<a href="/index/index/mortgageCalculator/mortgagecalculator.html"><div class="taxation">

								 		</div></a>
								 	</div>
								</div>
			                </div>

			                <!-- 常见问题 -->
			                <div class="problem bg-white">
			                	<div class="problem-head">
			                		<h3>常见问题</h3>
			                		<div class="images-text-right">
			                		<a href="/index/index/problemList/problemList.html"><span>更多</span></a><img src="<?php echo BACK_IMG_URL; ?>web/进入.png" alt="" class="gengduo">
			                		</div>
			                	</div>
			                	<div class="problem-content">
	                				<ul>
														<?php if(is_array($lit) || $lit instanceof \think\Collection || $lit instanceof \think\Paginator): $i = 0; $__LIST__ = $lit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					                		<a href="/index/index/commonproblem?id=<?php echo $vo['issue_id']; ?>"><li><?php echo $vo['headline']; ?></li></a>

														<?php endforeach; endif; else: echo "" ;endif; ?>
	                				</ul>
			                	</div>
			                </div>

			                <!-- 关于我们 -->
			                <div class="about bg-white">
			                	<div class="about-head">
			                		<h3>关于我们</h3>
			                		<div class="images-text-right">
			                		<a href="/index/index/aboutus/aboutus.html"><span>更多</span></a><img src="<?php echo BACK_IMG_URL; ?>web/进入.png" alt="" class="gengduo">
			                		</div>
			                	</div>
			                	<div class="about-content">
	                				<div class="shang"></div>
	                				<div class="xia"></div>
			                	</div>
			                </div>
						</div>
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

	<!-- 尾部 -->
	<footer class="text-center container" style="width: 100%; background-color: #423D47">
		<div class="container" style="padding-top: 20px;padding-bottom: 10px">

			<p style="color: #fff; font-size: 13px;">版权所有广州中瀛信息科技有限公司/ICP备案号：<a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action;jsessionid=qC41-hFNd8uMSIPcb0E6b67GlknQaSnxyHhTe-Zcnlt8LioAolzG!495133832"  style="color:#377BEE;">粤ICP备17053318号-1</a></p>
			<!-- <p style="color: #fff; font-size: 13px;">版权所有深圳市鑫易贷互联网金融有限公司/ICP备案号：<a href="http://www.beianbeian.com/s?keytype=5&q=%E7%B2%A4ICP%E5%A4%8715104065%E5%8F%B7-1"  style="color:#377BEE;">粤ICP备15104065号-1</a></p> -->
		</div>
	</footer>

	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BACK_JS_URL; ?>web/indexsend.js"></script>
	<script language="JavaScript">

	</script>

</body>
</html>
