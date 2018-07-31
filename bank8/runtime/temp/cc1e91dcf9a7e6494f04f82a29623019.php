<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/data/wwwroot/default/zuanbaodai/bank8/public/../application/index/view/policy/fhpolicy.html";i:1529034371;}*/ ?>
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
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BACK_CSS_URL; ?>policy/policyloan.css">
</head>
<body>

	<!-- banner -->

	<main class="main">
	<div class="logo">
			<img src="<?php echo BACK_IMG_URL; ?>policy/logo.png" class=""></div>
		<div class="topbanner">

		</div>
		<!-- 快速申请 -->
		<div class="Apply">
			<div class="container">
				<div class="row">
					<div class="title">
						<span><img src="<?php echo BACK_IMG_URL; ?>policy/qiu.gif" alt="" class="gif">立即申请<img src="<?php echo BACK_IMG_URL; ?>policy/zuqiu.png" alt="" class="redright"></span>
					</div>
					<form action="" class="form form-horizontal" name="myform">
						<table>
							<tr>
								<td colspan=3>
									<select class="select" id="city" name="city">
									<option value="广州"selected="selected">广州</option>
									<option value="深圳">深圳</option>
									<option value="珠海">珠海</option>
									<option value="杭州">杭州</option>
									<option value="其它城市">其它城市</option>
								</select>
								</td>
							</tr>
							<tr>
								<td colspan=3>
									<input class="chang" type="text" placeholder="请输入您的真实姓名" id="name" name="name"></input>
								</td>
							</tr>
							<tr>
								<td colspan=3>
									 <input class="chang" type="text" placeholder="请输入11位手机号码" id="phone" name="phone"></input>
								</td>
							</tr>

							<tr>
								<td colspan=2>
									<input class="duan" type="text" id="verfifcation" name="verfifcation" placeholder="请填写验证码" ></input>
								</td>
								<td colspan=1>
									<button id="phonecode" class="btn verificationcode" type="button" value="获取验证码" >获取验证码</button>
								</td>
							</tr>
							<tr>
								<td colspan=3>
									<button type="button" id="submit" class="button">提交</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!-- 优势 -->
		<div class="youshi">
			<div class="neikuan">
				<div class="biaoti">
					<img src="<?php echo BACK_IMG_URL; ?>policy/youshi.png" alt="" class="">
				</div>
				<div class="img-text">
					<img src="<?php echo BACK_IMG_URL; ?>policy/left.png" alt="">
					<div class="text">
						<p>保单生效1个月以上就可贷</p>
						<p class="tow">不看保单公司</p>
						<p class="three">不看险种</p>
					</div>
				</div>
				<div class="menkan">
					<span>轻松·高效·低门槛</span>
					<img src="<?php echo BACK_IMG_URL; ?>policy/right.png" alt="" class="redright">
				</div>
			</div>
		</div>

		<!-- 下载 -->
		<div class="xiazai">
			<p>更多精彩方案尽在八号钱庄APP,<br>赶紧下载吧!</p>
			<a href="/index/index/download/downlad.html"><button name="num" id="but">立即下载</button></a>
		</div>

		<div class="footer text-center">
			<p>杜绝借款犯罪，倡导合法借贷，信守借款合约</p>
			<p>市场有风险，投资需谨慎</p>
			<p>CP备案号：粤ICP备17053318号-1</p>
		</div>

	</main>
	<script src="<?php echo BACK_JS_URL; ?>jquery.min.js"></script>
	<script src="<?php echo BACK_JS_URL; ?>policy/fhpolicy.js"></script>
	<script src="<?php echo BACK_JS_URL; ?>policy/fhclick.js"></script>

</body>
</html>
